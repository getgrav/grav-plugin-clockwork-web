<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;
use Grav\Common\Utils;

/**
 * Class ClockworkWebPlugin
 * @package Grav\Plugin
 */
class ClockworkWebPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                // Uncomment following line when plugin requires Grav < 1.7
                // ['autoload', 100000],
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    /**
     * Composer autoload
     *
     * @return ClassLoader
     */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized(): void
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            // Put your main events here
        ]);

        $uri = $this->grav['uri'];
        $clockwork = $this->grav['debugger']->getClockwork();
        $route = $this->config->get('plugins.clockwork-web.route');
        if ($clockwork && $uri->route() === $route) {
            $this->initializeClockwork();
        }
    }

    public function initializeClockwork()
    {
        $locator = $this->grav['locator'];
        $assets = $locator->findResource('user://assets/clockwork-web', true, true);

        $clockwork = \Clockwork\Support\Vanilla\Clockwork::init([
             'api' => Utils::url('/__clockwork/'),
             'web' => [
                 'enable' => true,
                 'path' => $assets,
                 'uri' => Utils::url('/user/assets/clockwork-web')
             ]
        ]);

        $clockwork->returnWeb();
        exit;
    }
}
