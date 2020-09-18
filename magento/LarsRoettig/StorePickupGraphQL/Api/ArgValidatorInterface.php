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


namespace LarsRoettig\StorePickupGraphQL\Api;

use Magento\Framework\GraphQl\Exception\GraphQlInputException;

/**
 * @api
 */
interface ArgValidatorInterface
{

    /**
     * @param array $args
     * @throws GraphQlInputException
     */
    public function execute(array $args): void;
}
