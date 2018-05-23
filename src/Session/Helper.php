<?php

namespace Anddye\Session;

/**
 * Class Helper
 * 
 * @author Andrew Dyer <andrewdyer@outlook.com>
 * @category Session
 * @see https://github.com/andrewdyer/slim3-session-middleware
 */
class Helper
{

    /**
     * 
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * 
     */
    public function __isset($key)
    {
        return $this->exists($key);
    }

    /**
     * 
     */
    public function __set($key, $value)
    {
        return $this->set($key, $value);
    }

    /**
     * 
     */
    public function __unset($key)
    {
        return $this->delete($key);
    }

    /**
     * 
     */
    public function delete($key)
    {
        if ($this->exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    /**
     * 
     */
    public function destroy()
    {
        session_destroy();
    }

    /**
     * 
     */
    public function exists($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * 
     */
    public function get($key, $default = null)
    {
        if ($this->exists($key)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    /**
     * 
     */
    public function set($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

}
