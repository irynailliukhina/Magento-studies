<?php

namespace Ira\Promotion\Block;

use Magento\Framework\View\Element\Template;

class Promotion extends Template
{
    /**
 * @var int
 */
    public $earn = 0;
    public $clicks = 3;
    public $pending = 1;
    public $approved = 0;
    /**
     *
     * Returns text.
     *
     *
     * @return string
     */
    public function getText()
    {
        return "Text";
    }



}
