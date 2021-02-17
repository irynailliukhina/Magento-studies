<?php
namespace Ira\Author\Model\ResourceModel\Authors;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ira\Author\Model\Authors', 'Ira\Author\Model\ResourceModel\Authors');
    }

}
