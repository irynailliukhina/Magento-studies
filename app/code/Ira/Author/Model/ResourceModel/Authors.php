<?php
namespace Ira\Author\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;


class Authors extends AbstractDb
{
    public function __construct(Context $context, $connectionName = null)
    {
        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
        $this->_init('ira_authors', 'author_id');
    }


}
