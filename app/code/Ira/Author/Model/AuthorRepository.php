<?php

namespace Ira\Author\Model;

use Ira\Author\Api\AuthorRepositoryInterface;
use Ira\Author\Api\Data\AuthorInterface;
use Ira\Author\Api\Data\AuthorSearchResultInterfaceFactory;
use Ira\Author\Model\ResourceModel\Authors\Collection;
use Ira\Author\Model\ResourceModel\Authors\CollectionFactory as AuthorCollectionFactory;
use Ira\Author\Model\ResourceModel\AuthorsFactory as AuthorResourceFactory;
use Ira\Author\Model\AuthorsFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;

class AuthorRepository implements AuthorRepositoryInterface
{
    /**
     * @var AuthorsFactory
     */
    private $authorFactory;
    /**
     * @var \Ira\Author\Model\ResourceModel\Authors\CollectionFactory
     */
    private $authorCollectionFactory;
    /**
     * @var \Ira\Author\Api\Data\AuthorSearchResultInterfaceFactory
     */
    private $searchResultFactory;
    /**
     * @var \Ira\Author\Model\ResourceModel\AuthorsFactory;
     */
    private $authorResourceFactory;

    public function __construct(
        AuthorsFactory $authorFactory,
        AuthorCollectionFactory $authorCollectionFactory,
        AuthorSearchResultInterfaceFactory $authorSearchResultInterfaceFactory,
        AuthorResourceFactory $authorResourceFactory
    ) {
        $this->authorFactory = $authorFactory;
        $this->authorCollectionFactory = $authorCollectionFactory;
        $this->searchResultFactory = $authorSearchResultInterfaceFactory;
        $this->authorResourceFactory = $authorResourceFactory;
    }
    public function getById($id)
    {
        $author = $this->authorFactory->create();
        $this->authorResourceFactory->create()->load($author, $id);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__('Unable to find brand with ID "%1"', $id));
        }
        return $author;
    }
    public function save(AuthorInterface $author)
    {
        $author = $this->authorFactory->create()->setData($author);
        $this->authorResourceFactory->create()->save($author);
        return $author;
    }
    public function delete(AuthorInterface $author)
    {
        $author = $this->authorFactory->create()->setData($author);
        $this->authorResourceFactory->create()->delete($author);
    }
    public function getList(SearchCriteriaInterface $searchCriteria)
    {

        $collection = $this->authorCollectionFactory->create();


        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        $collection->load();
        return $this->buildSearchResult($searchCriteria, $collection);
    }
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
