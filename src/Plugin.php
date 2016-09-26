<?php
/**
 * Created by PhpStorm.
 * User: leo108
 * Date: 16/9/20
 * Time: 21:52
 */

namespace Leo108\CASServer\OAuth;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

abstract class Plugin
{
    /**
     * @var string
     */
    protected $fieldName;
    /**
     * @var string
     */
    protected $logo;
    /**
     * @var array
     */
    protected $lang = [];

    /**
     * @var string
     */
    protected $defaultLocale = 'en';
    /**
     * @var string
     */
    protected $fallbackLocale = 'en';

    /**
     * Plugin constructor.
     * @param string $fieldName
     * @param string $logo
     * @param array  $lang
     */
    public function __construct($fieldName, $logo, array $lang = [])
    {
        $this->fieldName = $fieldName;
        $this->logo      = $logo;
        $this->lang      = $lang;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param string $fieldName
     * @return $this
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return $this
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }

    /**
     * @param string $defaultLocale
     */
    public function setDefaultLocale($defaultLocale)
    {
        $this->defaultLocale = $defaultLocale;
    }

    /**
     * @return string
     */
    public function getFallbackLocale()
    {
        return $this->fallbackLocale;
    }

    /**
     * @param string $fallbackLocale
     */
    public function setFallbackLocale($fallbackLocale)
    {
        $this->fallbackLocale = $fallbackLocale;
    }

    /**
     * @param string $locale
     * @param string $name
     */
    public function addLang($locale, $name)
    {
        $this->lang[$locale] = $name;
    }

    /**
     * @param string $default
     * @param string $fallback
     * @return string
     */
    public function getName($default = '', $fallback = '')
    {
        $default  = $default ?: $this->defaultLocale;
        $fallback = $fallback ?: $this->fallbackLocale;
        if (isset($this->lang[$default])) {
            return $this->lang[$default];
        }

        if (isset($this->lang[$fallback])) {
            return $this->lang[$fallback];
        }

        return $this->fieldName;
    }

    /**
     * @param Request $request
     * @param string  $callback
     * @return RedirectResponse
     */
    abstract public function gotoAuthUrl(Request $request, $callback);

    /**
     * @param Request $request
     * @return OAuthUser
     */
    abstract public function getOAuthUser(Request $request);
}

