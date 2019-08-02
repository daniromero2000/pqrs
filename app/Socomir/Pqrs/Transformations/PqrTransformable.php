<?php

namespace App\Socomir\Pqrs\Transformations;

use App\Socomir\Pqrs\Pqr;
use App\Socomir\PqrStatuses\PqrStatus;
use App\Socomir\PqrStatuses\Repositories\PqrStatusRepository;
use App\Socomir\Items\Repositories\ItemRepository;

trait PqrTransformable
{
    protected function transformPqr(Pqr $pqr)
    {
        $prop = new Pqr;
        $prop->id = (int) $pqr->id;
        $prop->cedula = $pqr->cedula;
        $prop->name = $pqr->name;
        $prop->lead = $pqr->lead;
        $prop->created_at = $pqr->created_at;
        $prop->email = $pqr->email;
        $prop->phone = $pqr->phone;
        $prop->pqr = $pqr->pqr;
        $prop->asunto = $pqr->asunto;
        $prop->mensaje = $pqr->mensaje;
        $prop->status = (int) $pqr->status;

        $pqrStatusRepo = new PqrStatusRepository(new PqrStatus());
        $prop->pqr_status_id = $pqrStatusRepo->findPqrStatusById($pqr->pqr_status_id);
        return $prop;
    }
}
