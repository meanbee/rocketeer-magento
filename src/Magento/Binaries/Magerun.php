<?php
namespace Rocketeer\Plugins\Magento\Binaries;

use Illuminate\Container\Container;
use Rocketeer\Abstracts\AbstractBinary;
use Rocketeer\Binaries\Php;

class Magerun extends AbstractBinary
{

    /**
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        parent::__construct($app);

        // Set PHP as the parent
        $php = new Php($this->app);
        $this->setParent($php);
    }

    /**
     * Run setup scripts.
     *
     * @return string
     */
    public function migrate()
    {
        return $this->getCommand('sys:setup:run');
    }

    /**
     * Clean the cache.
     *
     * @return string
     */
    public function cleanCache()
    {
        return $this->getCommand('cache:clean');
    }

    /**
     * Build command options, including the configured root directory
     * option, if not specified already.
     *
     * @param string|\string[] $flags
     *
     * @return string
     */
    protected function buildOptions($flags)
    {
        if ($magento_root = $this->config->get('rocketeer-magento::magento_root')) {
            if (!isset($flags['--root-dir'])) {
                $flags['--root-dir'] = $magento_root;
            }
        }

        return parent::buildOptions($flags);
    }

    /**
     * Get an array of default paths to look for.
     *
     * @return string[]
     */
    protected function getKnownPaths()
    {
        return array(
            'n98-magerun.phar',
            $this->releasesManager->getCurrentReleasePath() . 'vendor/bin/n98-magerun.phar'
        );
    }
}
