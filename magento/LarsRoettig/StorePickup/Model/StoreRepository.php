<?php
declare(strict_types=1);

namespace LarsRoettig\StorePickup\Model;

use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;

use LarsRoettig\StorePickup\Api\Data\StoreInterface;
use LarsRoettig\StorePickup\Model\ResourceModel\Store as StoreResourceModel;
use LarsRoettig\StorePickup\Api\StoreRepositoryInterface;
use LarsRoettig\StorePickup\Model\ResourceModel\StoreCollectionFactory;

class StoreRepository implements StoreRepositoryInterface
{

    /**
     * @var StoreCollectionFactory
     */
    private $storeCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SearchResultsInterfaceFactory
     */
    private $storeSearchResultsInterfaceFactory;
    /**
     * @var StoreResourceModel
     */
    private $storeResourceModel;

    public function __construct(
        StoreCollectionFactory $storeCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SearchResultsInterfaceFactory $storeSearchResultsInterfaceFactory,
        StoreResourceModel $storeResourceModel
    ) {
        $this->storeCollectionFactory = $storeCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->storeSearchResultsInterfaceFactory = $storeSearchResultsInterfaceFactory;
        $this->storeResourceModel = $storeResourceModel;
    }

    /**
     * @inheritDoc
     */
    public function save(StoreInterface $store): void
    {
        try {
            $this->storeResourceModel->save($store);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save Store'));
        }
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface
    {
        $storeCollection = $this->storeCollectionFactory->create();
        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $storeCollection);
        }
        /** @var SearchResultsInterface $searchResult */
        $searchResult = $this->storeSearchResultsInterfaceFactory->create();
        $searchResult->setItems($storeCollection->getItems());
        $searchResult->setTotalCount($storeCollection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);
        return $searchResult;
    }
}
