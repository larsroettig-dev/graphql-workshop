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

namespace LarsRoettig\StorePickupGraphQL\Model\Resolver\Query;

use LarsRoettig\StorePickup\Api\StoreRepositoryInterface;
use LarsRoettig\StorePickup\Model\StoreRepository;
use LarsRoettig\StorePickupGraphQL\Model\Validator\Chain as ValidatorChain;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class PickUpStores implements ResolverInterface
{
    public const CURRENT_PAGE = 'currentPage';
    public const PAGE_SIZE = 'pageSize';

    /** @var ValidatorChain */
    private $validatorChain;
    /** @var StoreRepositoryInterface */
    private $storeRepository;
    /** @var SearchCriteriaBuilder */
    private $searchCriteriaBuilder;

    public function __construct(
        ValidatorChain $validatorChain,
        StoreRepositoryInterface $storeRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->validatorChain = $validatorChain;
        $this->storeRepository = $storeRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritDoc
     * @throws ValidatorException
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $this->validatorChain->validated($args);
        $searchCriteria = $this->searchCriteriaBuilder->build('pickup_stores', $args);
        $searchCriteria->setCurrentPage($args[self::CURRENT_PAGE]);
        $searchCriteria->setPageSize($args[self::PAGE_SIZE]);

        $result = $this->storeRepository->getList($searchCriteria);

        return [
            'totalCount' => $result->getTotalCount(),
            'items' => $result->getItems()
        ];
    }
}
