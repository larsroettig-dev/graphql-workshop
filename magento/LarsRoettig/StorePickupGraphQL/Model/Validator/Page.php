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

class Page implements ArgValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $args): void
    {
        if (!isset($args['pageSize']) || $args['pageSize'] < 0) {
            throw new GraphQlInputException(__('pageSize must be greate then 0'));
        }

        if (!isset($args['currentPage']) || $args['currentPage'] < 0) {
            throw new GraphQlInputException(__('pageSize must be greate then 0'));
        }
    }
}
