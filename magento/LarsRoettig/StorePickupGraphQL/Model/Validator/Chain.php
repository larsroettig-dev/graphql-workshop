<?php
/**
 * Copyright (c) 2018 TechDivision GmbH <info@techdivision.com> - TechDivision GmbH
 * All rights reserved
 *
 * This product includes proprietary software developed at TechDivision GmbH, Germany
 * For more information see http://www.techdivision.com/
 *
 * To obtain a valid license for using this software please contact us at
 * license@techdivision.com
 */
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
