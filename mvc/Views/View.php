<?php

class View
{
    public function render($tpl, $data = [])
    {
        if (!empty($tpl)) {
            include __DIR__ . '/../Templates/' . $tpl .'.php';
        }
    }
}