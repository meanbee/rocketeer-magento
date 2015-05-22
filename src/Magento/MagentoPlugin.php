<?php

namespace Rocketeer\Plugins\Magento;

use Illuminate\Container\Container;
use Rocketeer\Abstracts\AbstractPlugin;
use Rocketeer\Services\TasksHandler;

class MagentoPlugin extends AbstractPlugin
{

    protected $lookups = array(
        'binaries' => array(
            'Rocketeer\Plugins\Magento\Binaries\%s',
        )
    );

    /**
     * Setup the plugin.
     *
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        parent::__construct($app);

        $this->configurationFolder = implode(DIRECTORY_SEPARATOR, array(__DIR__, "..", "config"));
    }

    /**
     * Register Tasks with Rocketeer.
     *
     * @param \Rocketeer\Services\TasksHandler $queue
     */
    public function onQueue(TasksHandler $queue)
    {
    }
}
