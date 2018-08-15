<?php

namespace Anddye\Session;

/**
 * Class Helper.
 */
class Helper
{
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function __isset(string $key)
    {
        return $this->exists($key);
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function __set(string $key, $value)
    {
        return $this->set($key, $value);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function __unset(string $key)
    {
        return $this->delete($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool
    {
        if ($this->exists($key)) {
            unset($_SESSION[$key]);

            return true;
        }

        return false;
    }

    /**
     * Destroys all data registered to a session.
     */
    public function destroy()
    {
        session_destroy();
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function exists(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        if ($this->exists($key)) {
            return $_SESSION[$key];
        }

        return $default;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function set(string $key, $value)
    {
        return $_SESSION[$key] = $value;
    }
}
