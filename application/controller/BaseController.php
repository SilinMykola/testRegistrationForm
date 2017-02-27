<?php

abstract class BaseController
{
    protected $pdo = null;
    protected $view;

    public function __construct()
    {
        $this->pdo = PDOLib::getInstance()->getPdo();
        $this->view = new ViewLib(get_class($this));
    }
}