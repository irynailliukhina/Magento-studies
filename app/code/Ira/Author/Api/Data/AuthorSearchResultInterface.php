<?php

namespace Ira\Author\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface AuthorSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return AuthorInterface[]
     */
    public function getItems();

    /**
     * @param AuthorInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}