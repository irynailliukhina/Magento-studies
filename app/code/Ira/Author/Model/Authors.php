<?php
namespace Ira\Author\Model;

use Ira\Author\Api\Data\AuthorInterface;
use Magento\Framework\Model\AbstractModel;

class Authors extends AbstractModel implements AuthorInterface
{
    const NAME = 'name';
    const PORTRAIT = 'portrait';
    const BIO = 'bio';
    const ID = 'author_id';

    protected function _construct()
    {
        $this->_init('Ira\Author\Model\ResourceModel\Authors');
    }
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setName(string $name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getImageUrls()
    {
        return $this->_getData(self::PORTRAIT);
    }

    public function setImageUrls(array $urls)
    {
        $this->setData(self::PORTRAIT, $urls);
    }
    public function getBio(): string
    {
        return $this->getData(self::BIO);
    }

    public function setBio(string $bio)
    {
        $this->setData(self::BIO, $bio);
    }
    public function getId(): int
    {
        return $this->getData(self::ID);
    }
}
