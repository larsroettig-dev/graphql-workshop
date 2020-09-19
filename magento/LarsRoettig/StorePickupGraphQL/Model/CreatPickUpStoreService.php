<?php

declare(strict_types=1);

namespace LarsRoettig\StorePickupGraphQL\Model;

use LarsRoettig\StorePickup\Api\Data\StoreInterface;
use LarsRoettig\StorePickup\Api\Data\StoreInterfaceFactory;
use LarsRoettig\StorePickup\Api\StoreRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;

class CreatPickUpStoreService
{
    /**
     * @param DataObjectHelper $dataObjectHelper
     * @param StoreRepositoryInterface $storeRepository
     * @param StoreInterfaceFactory $storeInterfaceFactory
     */
    public function __construct(
        DataObjectHelper $dataObjectHelper,
        StoreRepositoryInterface $storeRepository,
        StoreInterfaceFactory $storeInterfaceFactory
    ) {
        $this->dataObjectHelper = $dataObjectHelper;
        $this->storeRepository = $storeRepository;
        $this->storeFactory = $storeInterfaceFactory;
    }

    /**
     * @param array $data
     * @return StoreInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function execute(array $data): StoreInterface
    {
        $store = $this->storeFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $store,
            $data,
            StoreInterface::class
        );
        $this->storeRepository->save($store);
        return $store;
    }
}
