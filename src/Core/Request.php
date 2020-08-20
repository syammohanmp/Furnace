<?php

/**
 * @package  Furnace
 * @author  Syam Mohan <syamvilakudy@hotmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0
 * @link  https://github.com/syamvilakudy/Furnace
 */

namespace Furnace\Core;

/**
 * Request class
 */
class Request
{
    public $get = array();
    public $post = array();
    public $cookie = array();
    public $files = array();
    public $server = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);
        $this->request = $this->clean($_REQUEST);
        $this->cookie = $this->clean($_COOKIE);
        $this->files = $this->clean($_FILES);
        $this->server = $this->clean($_SERVER);
    }

    /**
     *
     * @param  array  $data
     *
     * @return  array
     */
    public function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);

                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = trim(htmlspecialchars($data, ENT_COMPAT, 'UTF-8'));
        }

        return $data;
    }
}
