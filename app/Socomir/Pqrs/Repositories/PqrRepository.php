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
    /**
     * PqrRepository constructor.
     * @param Pqr $pqr
     */
    public function __construct(Pqr $pqr)
    {
        parent::__construct($pqr);
        $this->model = $pqr;
    }

    /**
     * List all the employees
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return \Illuminate\Support\Collection
     */
    public function listPqrs(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Support
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Create the pqr
     *
     * @param array $params
     * @return Pqr
     * @throws CreatePqrInvalidArgumentException
     */
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

    /**
     * Update the pqr
     *
     * @param array $params
     *
     * @return bool
     * @throws UpdatePqrInvalidArgumentException
     */
    public function updatePqr(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new UpdatePqrInvalidArgumentException($e);
        }
    }

    /**
     * Find the pqr or fail
     *
     * @param int $id
     *
     * @return Pqr
     * @throws PqrNotFoundException
     */
    public function findPqrById(int $id): Pqr
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrNotFoundException($e);
        }
    }


    /**
     * Find the pqr or fail
     *
     * @param string $email
     *
     * @return Pqr
     * @throws PqrNotFoundException
     */
    public function findPqrByEmail(string $email): Pqr
    {
        try {
            return $this->findOneOrFailEmail($email);
        } catch (ModelNotFoundException $e) {
            throw new PqrNotFoundException($e);
        }
    }

    /**
     * Delete a pqr
     *
     * @return bool
     * @throws \Exception
     */
    public function deletePqr(): bool
    {
        return $this->delete();
    }

    /**
     * @param string $text
     * @return mixed
     */
    public function searchPqr(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->all();
        }
        return $this->model->searchPqr($text)->get();
    }

    /**
     * @param int $amount
     * @param array $options
     * @return \Stripe\Charge
     * @throws PqrPaymentChargingErrorException
     */
    public function charge(int $amount, array $options)
    {
        try {
            return $this->model->charge($amount * 100, $options);
        } catch (\Exception $e) {
            throw new PqrPaymentChargingErrorException($e);
        }
    }

    /**
     * Send email to pqr
     */
    public function sendEmailToPqr($pqrMail)
    {
        Mail::to($pqrMail->email)
            ->send(new SendWelcomeToPqrMailable($this->findPqrById($pqrMail->id)));
    }

    /**
     * Send email notification to the admin
     */
    public function sendEmailNotificationToAdmin($pqrMail)
    {
        $employeeRepo = new EmployeeRepository(new Employee);
        $employee = $employeeRepo->findEmployeeById(4);

        Mail::to($employee)
            ->send(new sendWelcomeEmailNotificationToAdminMailable($this->findPqrById($pqrMail->id)));
    }
}
