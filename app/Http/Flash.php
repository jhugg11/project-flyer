<?php
/**
 * Created by IntelliJ IDEA.
 * User: hugg
 * Date: 3/3/16
 * Time: 9:40 AM
 */

namespace App\Http;

/**
 * Class Flash
 * @package App\Http
 * @param string $title
 * @param string $message
 * @param string $level
 * @param string $key
 * @return void
 */
class Flash
{
    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
    }

    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');

    }

    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');

    }

    public function overlay($title, $message)
    {
        return $this->create($title, $message, 'error', 'flash_message_overlay');

    }
}