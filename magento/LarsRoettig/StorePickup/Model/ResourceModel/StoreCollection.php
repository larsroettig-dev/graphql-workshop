<?php
declare(strict_types=1);

namespace LarsRoettig\StorePickup\Model\ResourceModel;

use LarsRoettig\StorePickup\Model\ResourceModel\Store as StoreResourceModel;
use LarsRoettig\StorePickup\Model\Store as StoreModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class StoreCollection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(StoreModel::class, StoreResourceModel::class);
    }
}
