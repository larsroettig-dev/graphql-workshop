<?php
declare(strict_types=1);

namespace LarsRoettig\StorePickup\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use LarsRoettig\StorePickup\Api\Data\StoreInterface;

/**
 * @api
 */
interface StoreRepositoryInterface
{
    /**
     * Save the Store data.
     *
     * @param \LarsRoettig\StorePickup\Api\Data\StoreInterface $store
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(StoreInterface $store): void;

    /**
     * Find Stores by given SearchCriteria
     * SearchCriteria is not required because load all stores is useful case
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface;
}
