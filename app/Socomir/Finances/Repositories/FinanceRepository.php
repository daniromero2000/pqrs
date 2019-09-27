<?php

namespace App\Socomir\Finances\Repositories;

use App\Socomir\Finances\Exceptions\FinanceCreateErrorException;
use App\Socomir\Finances\Exceptions\FinanceUpdateErrorException;
use App\Socomir\Tools\UploadableTrait;
use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\FinanceImages\FinanceImage;
use App\Socomir\Finances\Exceptions\FinanceNotFoundException;
use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Socomir\Finances\Transformations\FinanceTransformable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FinanceRepository extends BaseRepository implements FinanceRepositoryInterface
{
    use FinanceTransformable, UploadableTrait;

    public function __construct(Finance $finance)
    {
        parent::__construct($finance);
        $this->model = $finance;
    }


    public function listFinances(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Collection
    {
        return $this->all($columns, $order, $sort);
    }


    public function createFinance(array $data): Finance
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new FinanceCreateErrorException($e);
        }
    }


    public function updateFinance(array $data): bool
    {
        $filtered = collect($data)->except('image')->all();

        try {
            return $this->model->where('id', $this->model->id)->update($filtered);
        } catch (QueryException $e) {
            throw new FinanceUpdateErrorException($e);
        }
    }


    public function findFinanceById(int $id): Finance
    {
        try {
            return $this->transformFinance($this->findOneOrFail($id));
        } catch (ModelNotFoundException $e) {
            throw new FinanceNotFoundException($e);
        }
    }


    public function deleteFinance(Finance $finance): bool
    {
        $finance->images()->delete();
        return $finance->delete();
    }


    public function removeFinance(): bool
    {
        return $this->model->where('id', $this->model->id)->delete();
    }


    public function detachYears()
    {
        $this->model->years()->detach();
    }


    public function getYears(): Collection
    {
        return $this->model->years()->get();
    }


    public function syncYears(array $params)
    {
        $this->model->years()->sync($params);
    }


    public function deleteFile(array $file, $disk = null): bool
    {
        return $this->update(['cover' => null], $file['finance']);
    }


    public function deleteThumb(string $src): bool
    {
        return DB::table('finance_images')->where('src', $src)->delete();
    }


    public function findFinanceBySlug(array $slug): Finance
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new FinanceNotFoundException($e);
        }
    }


    public function searchFinance(string $text): Collection
    {
        if (!empty($text)) {
            return $this->model->searchFinance($text);
        } else {
            return $this->listFinances();
        }
    }


    public function findFinanceImages(): Collection
    {
        return $this->model->images()->get();
    }


    public function saveCoverImage(UploadedFile $file): string
    {
        return $file->store('finances', ['disk' => 'public']);
    }


    public function saveFinanceImages(Collection $collection)
    {
        $collection->each(function (UploadedFile $file) {
            $filename = $this->storeFile($file);
            $financeImage = new FinanceImage([
                'finance_id' => $this->model->id,
                'src' => $filename
            ]);
            $this->model->images()->save($financeImage);
        });
    }
}
