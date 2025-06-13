<?php

namespace Core;

abstract class Robot
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function identify()
    {
        echo "Model: $this->model" . PHP_EOL;
    }
}