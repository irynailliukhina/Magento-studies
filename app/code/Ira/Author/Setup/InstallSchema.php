<?php
namespace Ira\Author\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
        * Create table 'authors'
        */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('ira_authors'))
            ->addColumn(
                'author_id',
                Table::TYPE_INTEGER,
                null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Author ID'
            )
            ->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Message'
            )
            ->addColumn(
                'portrait',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Message'
            )
            ->addColumn(
                'bio',
                Table::TYPE_TEXT,
                '64k',
                ['nullable' => false, 'default' => ''],
                'Message'
            )->setComment("Authors table");
        $setup->getConnection()->createTable($table);
    }
}
