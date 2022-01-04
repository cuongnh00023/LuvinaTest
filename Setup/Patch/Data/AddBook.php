<?php

namespace Luvina\Test\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class AddBook implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $data[] = ['title' => 'Book 1', 'author' => 'Author 1', 'year' => '2021', 'price' => 1000.99];
        $data[] = ['title' => 'Book 2', 'author' => 'Author 2', 'year' => '2021', 'price' => 1100.99];
        $data[] = ['title' => 'Book 3', 'author' => 'Author 3', 'year' => '2021', 'price' => 1200.99];
        $data[] = ['title' => 'Book 4', 'author' => 'Author 4', 'year' => '2021', 'price' => 1300.99];
        $data[] = ['title' => 'Book 5', 'author' => 'Author 5', 'year' => '2021', 'price' => 1400.99];
        $data[] = ['title' => 'Book 6', 'author' => 'Author 6', 'year' => '2021', 'price' => 1500.99];

        $columns = ['title', 'author', 'year', 'price'];
        $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('books'),
            $columns,
            $data
        );

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    public function revert()
    {
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
