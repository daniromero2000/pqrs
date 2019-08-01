<?php

namespace App\Socomir\PqrCommentaries\Transformations;

use App\Socomir\PqrCommentaries\Commentary;
use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqr\Repositories\PqrRepository;
use App\Socomir\Provinces\Repositories\ProvinceRepository;


trait PqrCommentaryTransformable
{
    /**
     * Transform the commentary
     *
     * @param Commentary $commentary
     *
     * @return Commentary
     * @throws \App\Socomir\Pqrs\Exceptions\PqrNotFoundException
     */
    public function transformPqrCommentary(Commentary $commentary)
    {
        $obj = new Commentary;
        $obj->id = $commentary->id;
        $obj->commentary_1 = $commentary->commentary_1;

        $customerRepo = new PqrRepository(new Pqr);
        $pqr = $customerRepo->findPqrById($commentary->pqr_id);
        $obj->pqr = $pqr->name;
        $obj->status = $commentary->status;

        return $obj;
    }
}
