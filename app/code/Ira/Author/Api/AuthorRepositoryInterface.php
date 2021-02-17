<?php
namespace Ira\Author\Api;

use Ira\Author\Api\Data\AuthorInterface;
use Ira\Author\Api\Data\AuthorSearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface AuthorRepositoryInterface
{
    /**
     * @param int $id
     * @return AuthorInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id);

    /**
     * @param AuthorInterface $author
     * @return AuthorInterface
     */
    public function save(AuthorInterface $author);

    /**
     * @param AuthorInterface $author
     * @return void
     */
    public function delete(AuthorInterface $author);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return AuthorSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
