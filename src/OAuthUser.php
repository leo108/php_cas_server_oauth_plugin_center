<?php
/**
 * Created by PhpStorm.
 * User: leo108
 * Date: 2016/9/22
 * Time: 14:02
 */

namespace Leo108\CASServer\OAuth;

class OAuthUser
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $avatar;
    /**
     * @var array
     */
    protected $original;
    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $binds;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return array
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @param array $original
     * @return $this
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @param string $key
     * @param string $id
     * @return $this
     */
    public function addBind($key, $id)
    {
        $this->binds[$key] = $id;

        return $this;
    }

    /**
     * @return array
     */
    public function getBinds()
    {
        return $this->binds;
    }
}
