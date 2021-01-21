<?php

declare(strict_types=1);

namespace App\Constraint;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;

class EventsEditConstraintFactory
{
    public static function build(): Collection
    {
        return new Collection(
            [
                'allowExtraFields' => true,
                'fields' => [
                    'id' => [
                        new Assert\NotBlank(),
                        new Assert\Type('int'),
                    ],
                ],
            ],
        );
    }
}
