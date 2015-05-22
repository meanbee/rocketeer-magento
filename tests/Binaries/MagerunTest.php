<?php
namespace Rocketeer\Plugins\Magento\Binaries;

use Rocketeer\Plugins\Magento\TestCases\MagentoTestCase;

class MagerunTest extends MagentoTestCase
{

    public function testCanRunMigrations()
    {
        $php = $this->binaries['php'];

        /** @var \Rocketeer\Plugins\Magento\Binaries\Magerun $magerun */
        $magerun = $this->builder->buildBinary('magerun');

        $this->assertEquals($php . ' n98-magerun.phar sys:setup:run', $magerun->migrate());
    }

    public function testCanCleanCache()
    {
        $php = $this->binaries['php'];

        /** @var \Rocketeer\Plugins\Magento\Binaries\Magerun $magerun */
        $magerun = $this->builder->buildBinary('magerun');

        $this->assertEquals($php . ' n98-magerun.phar cache:clean', $magerun->cleanCache());
    }

    public function testRootDirParameter()
    {
        $this->swapConfig(array(
            'rocketeer-magento::magento_root' => 'public'
        ));

        $php = $this->binaries['php'];

        /** @var \Rocketeer\Plugins\Magento\Binaries\Magerun $magerun */
        $magerun = $this->builder->buildBinary('magerun');

        $this->assertEquals($php . ' n98-magerun.phar test --root-dir="public"', $magerun->getCommand('test'));
    }
}
