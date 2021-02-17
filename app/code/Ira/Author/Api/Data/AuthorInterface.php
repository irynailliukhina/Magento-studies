<?php

namespace Ira\Author\Api\Data;

interface AuthorInterface
{
    public function getName(): string;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name);
    public function getImageUrls();
    public function setImageUrls(array $urls);
    public function getBio();
    public function setBio(string $bio);
}
