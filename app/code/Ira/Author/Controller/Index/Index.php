<?php

namespace Ira\Author\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;
    /**
     * @var PageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
    }
    /**
     * @return Page
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}

