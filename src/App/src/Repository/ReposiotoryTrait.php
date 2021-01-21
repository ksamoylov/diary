<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

trait ReposiotoryTrait
{
    /**
     * @param Model $model
     * @param array $properties
     * @param array $map
     * @return Model
     */
    public function setProperties(Model $model, array $properties, array $map): Model
    {
        foreach ($properties as $key => $value) {
            if ($key === 'id' || empty($map[$key])) {
                continue;
            }

            $model->{$map[$key]}($value);
        }

        return $model;
    }
}
