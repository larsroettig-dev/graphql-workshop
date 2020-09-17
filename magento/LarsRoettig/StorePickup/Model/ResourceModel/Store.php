<?php
declare(strict_types=1);

namespace LarsRoettig\StorePickup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\PredefinedId;

class Store extends AbstractDb
{
    /**
     * Provides possibility of saving entity with predefined/pre-generated id
     */
    use PredefinedId;
    /**#@+
     * Constants related to specific db layer
     */
    private const TABLE_NAME_STOCK = 'pickup_stores';
    /**#@-*/
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME_STOCK, 'entity_id');
    }
}
