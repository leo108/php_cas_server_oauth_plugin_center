<?php
/**
 * Created by PhpStorm.
 * User: leo108
 * Date: 16/9/20
 * Time: 21:50
 */

namespace Leo108\CASServer\OAuth;

class PluginCenter
{
    /**
     * @var string
     */
    protected $defaultLocale = 'en';
    /**
     * @var string
     */
    protected $fallbackLocale = 'en';

    /**
     * @var array
     */
    protected $plugins = [];

    /**
     * PluginCenter constructor.
     * @param string $defaultLocale
     * @param string $fallbackLocale
     */
    public function __construct($defaultLocale, $fallbackLocale)
    {
        $this->defaultLocale  = $defaultLocale;
        $this->fallbackLocale = $fallbackLocale;
    }

    /**
     * @param Plugin $plugin
     */
    public function register(Plugin $plugin)
    {
        $plugin->setDefaultLocale($this->defaultLocale);
        $plugin->setFallbackLocale($this->fallbackLocale);
        $this->plugins[$plugin->getFieldName()] = $plugin;
    }

    /**
     * @param $fieldName
     * @return Plugin|null
     */
    public function get($fieldName)
    {
        return isset($this->plugins[$fieldName]) ? $this->plugins[$fieldName] : null;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->plugins;
    }
}
