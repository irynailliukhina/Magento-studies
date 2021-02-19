<?php

namespace Ira\Promotion\Setup;

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
//    const YOUR_STORE_ID = 1;

    /**
     * @var BlockFactory
     */
    private $_blockFactory;

    /**
     * UpgradeData constructor
     *
     * @param BlockFactory $_blockFactory
     */
    public function __construct(
        BlockFactory $blockFactory
    ) {
        $this->_blockFactory = $blockFactory;
    }

    /**
     * Upgrade data for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $cmsBlock = $this->_blockFactory->create()->load('test-block', 'identifier');

            $cmsBlockData = [
                'title' => 'Promo',
                'identifier' => 'promoBlock',
                'is_active' => 1,
                'stores' => [0],
                'content' => '<div class="container_header">
<p class="promo_header">100$ Store Credit for you,&nbsp;100$ Store Credit for your friend</p>
<p class="promo_info">Tell your friends to enter your coupon checkout and They will receive 30% off their first purchase</p>
</div>',
            ];

            if (!$cmsBlock->getId()) {
                $this->_blockFactory->create()->setData($cmsBlockData)->save();
            } else {
                $cmsBlock->setContent($cmsBlockData['content'])->save();
            }
        }

        $setup->endSetup();
    }
}
