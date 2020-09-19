<?php

declare(strict_types=1);


namespace LarsRoettig\StorePickupGraphQL\Model\Validator;

use LarsRoettig\StorePickupGraphQL\Api\ArgValidatorInterface;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;

class Chain
{
    /** @var ArgValidatorInterface[] */
    private $validatorList;

    /**
     * @param ArgValidatorInterface[] $validatorList
     */
    public function __construct(array $validatorList = [])
    {
        $this->validatorList = $validatorList;
    }

    /**
     * @param array $args
     * @throws GraphQlInputException
     */
    public function validated(array $args): void
    {
        foreach ($this->validatorList as $item) {
            $item->execute($args);
        }
    }

}
