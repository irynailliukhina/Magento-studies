<?php
namespace Ira\Author\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 *  @codeCoverageIgnore
 */

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data =
            [
                [
                    'name' => 'Erich Maria Remarque',
                    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Bundesarchiv_Bild_183-K1018-513%2C_Erich_Maria_Remarque.jpg',
                    'bio' => 'Erich Maria Remarque (22 June 1898 – 25 September 1970) was a German novelist. His landmark novel All Quiet on the Western Front (1928), about the German military experience of World War I, was an international best-seller which created a new literary genre, and was subsequently made into the film All Quiet on the Western Front (1930).',
                ],
                [
                    'name' => 'John Ronald Reuel Tolkien',
                    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/J._R._R._Tolkien%2C_1940s.jpg/440px-J._R._R._Tolkien%2C_1940s.jpg',
                    'bio' => 'John Ronald Reuel Tolkien was an English writer, poet, philologist, and academic, best known as the author of the high fantasy works The Hobbit and The Lord of the Rings.'
                ]
            ];

        foreach ($data as $bind) {
            $setup->getConnection()
                ->insertForce($setup->getTable('ira_authors'), $bind);
        }
    }
}
