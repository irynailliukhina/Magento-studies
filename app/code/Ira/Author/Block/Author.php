<?php

namespace Ira\Author\Block;

use Ira\Author\Api\AuthorRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Template;

class Author extends Template
{
    private $request;
    private $authorRepository;
    private $searchCriteriaBuilder;

    public function __construct(
        Template\Context $context,
        RequestInterface $request,
        AuthorRepositoryInterface $authorRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->request = $request;
        $this->authorRepository = $authorRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getParam()
    {
        return $this->request->getParam('id', null);
    }
    public function getAuthors()
    {
        $id = $this->getParam();
        if (is_null($id)) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            return $this->authorRepository->getList($searchCriteria)->getItems();
        }
        return $this->authorRepository->getById($id);
    }
}
