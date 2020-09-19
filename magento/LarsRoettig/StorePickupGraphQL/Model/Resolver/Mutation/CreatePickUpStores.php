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

namespace LarsRoettig\StorePickupGraphQL\Model\Resolver\Mutation;

use LarsRoettig\StorePickupGraphQL\Model\CreatPickUpStoreService;
use LarsRoettig\StorePickupGraphQL\Model\Validator\Chain;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CreatePickUpStores implements ResolverInterface
{
    /**@var CreatPickUpStoreService */
    private $creatPickUpStore;
    /** @var Chain */
    private $validatorChain;

    /**
     * @param CreatPickUpStoreService $creatPickUpStore
     * @param Chain $validatorChain
     */
    public function __construct(CreatPickUpStoreService $creatPickUpStore, Chain $validatorChain)
    {
        $this->creatPickUpStore = $creatPickUpStore;
        $this->validatorChain = $validatorChain;
    }

    /**
     * @inheritDoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $this->validatorChain->validated($args);
        try {
            $store = $this->creatPickUpStore->execute($args['input']);
            return ['totalCount' => 1, 'items' => [$store]];
        } catch (\Exception $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }
    }
}
