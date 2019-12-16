<?php

function d($str)
{
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

function redirect($url)
{
    header("Location: " . $url,TRUE,301);
    die();
}

function setSession($var, $val)
{
    $_SESSION[$var] = $val;
}

function getSession($var)
{
    return $_SESSION[$var];
}