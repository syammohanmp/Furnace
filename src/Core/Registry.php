<?php

/**
 * @package  Furnace
 * @author  Syam Mohan <syamvilakudy@hotmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0
 * @link  https://github.com/syamvilakudy/Furnace
 */

namespace Furnace\Core;

/**
 * Registry class
 */
final class Registry
{
    private $data = array();

    /**
     * Get
     *
     * @param  string  $key
     * @return  mixed
     */
    public function get($key)
    {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    /**
     * Set
     *
     * @param  string  $key
     * @param  string  $value
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Has
     *
     * @param  string  $key
     *
     * @return  bool
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }
}
