<?php
if (! function_exists('redirect')) {
    function redirect($page)
    {
        header('location:' . URL_BASE . $page);
        exit;
    }
}
