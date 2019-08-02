<?php

namespace App\Socomir\PqrCommentaries\Transformations;

use App\Socomir\PqrCommentaries\PqrCommentary;
use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Repositories\PqrRepository;
use App\Socomir\Provinces\Repositories\ProvinceRepository;


trait PqrCommentaryTransformable
{
    /**
     * Transform the pqrcommentary
     *
     * @param PqrCommentary $pqrcommentary
     *
     * @return PqrCommentary
     * @throws \App\Socomir\Pqrs\Exceptions\PqrNotFoundException
     */
    public function transformPqrCommentary(PqrCommentary $pqrcommentary)
    {
        $obj = new PqrCommentary;
        $obj->id = $pqrcommentary->id;
        $obj->commentary_1 = $pqrcommentary->commentary_1;

        $pqrRepo = new PqrRepository(new Pqr);
        $pqr = $pqrRepo->findPqrById($pqrcommentary->pqr_id);
        $obj->pqr = $pqr->name;
        $obj->status = $pqrcommentary->status;

        return $obj;
    }
}
