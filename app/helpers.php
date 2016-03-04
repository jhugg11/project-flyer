<?php
/**
 * Created by IntelliJ IDEA.
 * User: hugg
 * Date: 3/3/16
 * Time: 9:43 AM
 */

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}