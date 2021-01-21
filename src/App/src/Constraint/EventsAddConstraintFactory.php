<?php

declare(strict_types=1);

namespace App\Constraint;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;

class EventsAddConstraintFactory
{
    public static function build(): Collection
    {
        return new Collection(
            [
                'allowExtraFields' => true,
                'fields' => [
                    'name' => [
                        new Assert\NotBlank(),
                        new Assert\Type('string'),
                    ],
                    'type' => [
                        new Assert\NotBlank(),
                        new Assert\Type('int'),
                    ],
                    'target_date' => [
                        new Assert\NotBlank(),
                        new Assert\Type('string'),
                    ],
                ],
            ],
        );
    }
}
