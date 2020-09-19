<?php

declare(strict_types=1);

namespace LarsRoettig\StorePickupGraphQL\Model\Validator\Mutation;

use LarsRoettig\StorePickupGraphQL\Api\ArgValidatorInterface;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;

class PickUpStoresArgs implements ArgValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $args): void
    {
        if (empty($args['input']) || !is_array($args['input'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }
    }
}
