<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validation;

trait ValidatorTrait
{
    /**
     * @param Constraint $constraint
     * @param $data
     * @return array
     */
    protected function validate(Constraint $constraint, $data): array
    {
        $violations = [];

        $errors = Validation::createValidator()->validate($data, $constraint);

        if ($errors->count()) {

            /** @var ConstraintViolationInterface $error */
            foreach ($errors as $error) {
                $violations[] = [
                    'field' => $error->getPropertyPath(),
                    'message' => $error->getMessage(),
                    'value' => $error->getInvalidValue(),
                ];
            }
        }

        return $violations;
    }

    /**
     * @param array $violations
     * @return array
     */
    public function createResponseMessageByViolations(array $violations): array
    {
        $responseMessage = [];

        foreach ($violations as $violation) {
            if (!isset($violation['field']) && !isset($violation['message'])) {
                continue;
            }

            // Значение $violation['field'] имеет вид: [name], необходимо избавиться от тегов по краям
            $cleanField = substr($violation['field'], 1, -1);
            $responseMessage[$cleanField] = $violation['message'];
        }

        return ['Error' => $responseMessage,];
    }
}

