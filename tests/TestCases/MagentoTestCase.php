<?php
namespace Rocketeer\Plugins\Magento\TestCases;

use Rocketeer\TestCases\RocketeerTestCase;

abstract class MagentoTestCase extends RocketeerTestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->tasks->plugin('Rocketeer\Plugins\Magento\MagentoPlugin');
    }
}
