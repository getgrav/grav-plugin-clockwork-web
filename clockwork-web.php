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
        $route = rtrim((string)$this->config->get('plugins.clockwork-web.route'), '/') ?: '/clockwork';
        $current = $uri->route();

        // Match the route itself and everything beneath it: the UI's own assets
        // (index.html, js, img) are served from the same prefix.
        if ($clockwork && ($current === $route || strpos($current, $route . '/') === 0)) {
            $this->initializeClockwork($route);
        }
    }

    public function initializeClockwork(string $route): void
    {
        // Serve the Web UI straight from Clockwork's own package through this
        // route. Copying it into user:// broke on multisite installs, where the
        // copy lands in user/env/<site>/assets but the URL pointed at
        // /user/assets, and user/env/ is blocked by the shipped web-server
        // configs anyway. It also kept a stale copy around across upgrades.
        $clockwork = \Clockwork\Support\Vanilla\Clockwork::init([
             'api' => Utils::url('/__clockwork/'),
             'web' => [
                 'enable' => Utils::url($route),
                 'path' => false,
             ]
        ]);

        $clockwork->returnWeb();
        exit;
    }
}
