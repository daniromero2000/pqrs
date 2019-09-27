<?php

namespace App\Socomir\Pqrs\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Exceptions\CreatePqrInvalidArgumentException;
use App\Socomir\Pqrs\Exceptions\PqrNotFoundException;
use App\Socomir\Pqrs\Exceptions\PqrPaymentChargingErrorException;
use App\Socomir\Pqrs\Exceptions\UpdatePqrInvalidArgumentException;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection as Support;
use App\Mail\SendWelcomeToPqrMailable;
use App\Mail\sendWelcomeEmailNotificationToAdminMailable;
use Illuminate\Support\Facades\Mail;
use App\Socomir\Employees\Employee;
use App\Socomir\Employees\Repositories\EmployeeRepository;

class PqrRepository extends BaseRepository implements PqrRepositoryInterface
{
    public function __construct(Pqr $pqr)
    {
        parent::__construct($pqr);
        $this->model = $pqr;
    }


    public function listPqrs(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Support
    {
        return $this->all($columns, $order, $sort);
    }


    public function createPqr(array $params): Pqr
    {
        try {
            $data = collect($params)->all();
            $pqr = new Pqr($data);
            $pqr->save();

            return $pqr;
        } catch (QueryException $e) {
            throw new CreatePqrInvalidArgumentException($e->getMessage(), 500, $e);
        }
    }


    public function updatePqr(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new UpdatePqrInvalidArgumentException($e);
        }
    }


    public function findPqrById(int $id): Pqr
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrNotFoundException($e);
        }
    }



    public function findPqrByEmail(string $email): Pqr
    {
        try {
            return $this->findOneOrFailEmail($email);
        } catch (ModelNotFoundException $e) {
            throw new PqrNotFoundException($e);
        }
    }

    public function deletePqr(): bool
    {
        return $this->delete();
    }


    public function searchPqr(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->all();
        }
        return $this->model->searchPqr($text)->get();
    }


    public function charge(int $amount, array $options)
    {
        try {
            return $this->model->charge($amount * 100, $options);
        } catch (\Exception $e) {
            throw new PqrPaymentChargingErrorException($e);
        }
    }


    public function sendEmailToPqr($pqrMail)
    {
        Mail::to($pqrMail->email)
            ->send(new SendWelcomeToPqrMailable($this->findPqrById($pqrMail->id)));
    }


    public function sendEmailNotificationToAdmin($pqrMail)
    {
        $employeeRepo = new EmployeeRepository(new Employee);
        $employee = $employeeRepo->findEmployeeById(4);

        Mail::to($employee)
            ->send(new sendWelcomeEmailNotificationToAdminMailable($this->findPqrById($pqrMail->id)));
    }
}
