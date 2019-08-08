<?php

namespace App\Socomir\Finances\Repositories\Interfaces;


use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Finances\Finance;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface FinanceRepositoryInterface extends BaseRepositoryInterface
{
    public function listFinances(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Collection;

    public function createFinance(array $data): Finance;

    public function updateFinance(array $data): bool;

    public function findFinanceById(int $id): Finance;

    public function deleteFinance(Finance $finance): bool;

    public function removeFinance(): bool;

    public function detachYears();

    public function getYears(): Collection;

    public function syncYears(array $params);

    public function deleteFile(array $file, $disk = null): bool;

    public function deleteThumb(string $src): bool;

    public function findFinanceBySlug(array $slug): Finance;

    public function searchFinance(string $text): Collection;

    public function findFinanceImages(): Collection;

    public function saveCoverImage(UploadedFile $file): string;

    public function saveFinanceImages(Collection $collection);
}
