<?php

namespace App\Socomir\Lead\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Lead\Lead;
use App\Socomir\Lead\Repositories\Interfaces\LeadsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection as Support;
use App\Mail\SendWelcomeToPqrMailable;
use App\Mail\sendWelcomeEmailNotificationToAdminMailable;
use Illuminate\Support\Facades\Mail;

class LeadsRepository extends BaseRepository implements LeadsRepositoryInterface
{
    public function __construct(lead $lead)
    {
        parent::__construct($lead);
        $this->model = $lead;
    }


    public function listleads(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Support
    {
        return $this->all($columns, $order, $sort);
    }


    public function createleads(array $params): lead
    {
        try {
            $data = collect($params)->all();
            $lead = new lead($data);
            $lead->save();

            return $lead;
        } catch (QueryException $e) {
            throw new CreatePqrInvalidArgumentException($e->getMessage(), 500, $e);
        }
    }


    public function updateLeads(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new UpdatePqrInvalidArgumentException($e);
        }
    }


    public function findleadById(int $id): lead
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrNotFoundException($e);
        }
    }



    public function findleadByEmail(string $email): lead
    {
        try {
            return $this->findOneOrFailEmail($email);
        } catch (ModelNotFoundException $e) {
            throw new PqrNotFoundException($e);
        }
    }

    public function deleteleads(): bool
    {
        return $this->delete();
    }


    public function searchleads(string $text = null): Collection
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
