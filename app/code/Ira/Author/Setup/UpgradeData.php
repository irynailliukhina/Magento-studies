<?php

namespace Ira\Author\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     *
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     *
     */

//    protected function __construct(EavSetupFactory $eavSetupFactory)
//    {
//        $this->eavSetupFactory = $eavSetupFactory;
//    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '2.0.0') < 0
        ) {
            $table = $setup->getTable('ira_authors');
            $setup->getConnection()
                ->insertForce($table, [
                    'name' => 'Slava Kurilov',
                    'portrait' => 'https://farm1.static.flickr.com/124/355158754_98f4cea911_o.jpg',
                    'bio' => 'Stanislav Vasilyevich Kurilov (Russian: Станислав Васильевич Курилов, July 17, 1936 – January 29, 1998) was a Soviet, Canadian, and Israeli oceanographer. He escaped from the Soviet Union by jumping overboard from a cruise liner in the open ocean, and swimming to the Philippines.',
                    'language'=>'Russian']);

            $setup->getConnection()
                ->update($table, ['language' => 'English'], 'author_id IN (2)');

            $setup->getConnection()
                ->update($table, ['language' => 'German'], 'author_id IN (1)');
        }
        $setup->endSetup();
    }
}
