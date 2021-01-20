<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Builder
     */
    private function createQueryBuilder(): Builder
    {
        return $this->model::query();
    }

    /**
     * @todo понять, как убрать лишнюю вложенность
     *
     * @param array $criteria
     * @param string|null $operator
     * @param bool|null $notIn
     * @param int|null $limit
     * @param int|null $offset
     * @return Builder|Collection
     */
    public function findBy(
        array $criteria,
        string $operator = null,
        bool $notIn = null,
        int $limit = null,
        int $offset = null
    ): Collection {
        $collection = new Collection();

        $builder = $this->createQueryBuilder();

        if ($limit !== null) {
            $builder->limit($limit);
        }

        if ($offset !== null) {
            $builder->offset($offset);
        }

        if ($notIn === null) {
            $collection->add($builder->where($criteria, $operator)->get());
        } else {
            foreach ($criteria as $key => $value) {
                $collection->add($builder->whereIn($key, $value, $operator, $notIn)->get());
            }
        }

        return $collection;
    }
}
