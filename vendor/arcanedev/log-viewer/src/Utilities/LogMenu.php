<?php namespace Arcanedev\LogViewer\Utilities;

use Arcanedev\LogViewer\Contracts\Utilities\LogMenu as LogMenuContract;
use Arcanedev\LogViewer\Contracts\Utilities\LogStyler as LogStylerContract;
use Arcanedev\LogViewer\Entities\Log;
use Illuminate\Contracts\Config\Repository as ConfigContract;

/**
 * Class     LogMenu
 *
 * @package  Arcanedev\LogViewer\Utilities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LogMenu implements LogMenuContract
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The config repository instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * The log styler instance.
     *
     * @var \Arcanedev\LogViewer\Contracts\Utilities\LogStyler
     */
    private $styler;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * LogMenu constructor.
     *
     * @param  \Illuminate\Contracts\Config\Repository   $config
     * @param  \Arcanedev\LogViewer\Contracts\Utilities\LogStyler  $styler
     */
    public function __construct(ConfigContract $config, LogStylerContract $styler)
    {
        $this->setConfig($config);
        $this->setLogStyler($styler);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the config instance.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     *
     * @return \Arcanedev\LogViewer\Utilities\LogMenu
     */
    public function setConfig(ConfigContract $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Set the log styler instance.
     *
     * @param  \Arcanedev\LogViewer\Contracts\Utilities\LogStyler  $styler
     *
     * @return \Arcanedev\LogViewer\Utilities\LogMenu
     */
    public function setLogStyler(LogStylerContract $styler)
    {
        $this->styler = $styler;

        return $this;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Make log menu.
     *
     * @param  \Arcanedev\LogViewer\Entities\Log  $log
     * @param  bool                               $trans
     *
     * @return array
     */
    public function make(Log $log, $trans = true)
    {
        $items = [];
        $route = $this->config('menu.filter-route');

        foreach($log->tree($trans) as $level => $item) {
            $items[$level] = array_merge($item, [
                'url'  => route($route, [$log->date, $level]),
                'icon' => $this->isIconsEnabled() ? $this->styler->icon($level) : '',
            ]);
        }

        return $items;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the icons are enabled.
     *
     * @return bool
     */
    private function isIconsEnabled()
    {
        return (bool) $this->config('menu.icons-enabled', false);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get config.
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return mixed
     */
    private function config($key, $default = null)
    {
        return $this->config->get("log-viewer.$key", $default);
    }
}
