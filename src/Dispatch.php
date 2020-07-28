<?php
namespace Asialong\WfYuncang;

use Hanson\Foundation\Foundation;

class Dispatch extends Foundation
{
    private $warehouse;

    public function __construct($config)
    {
        parent::__construct($config);
        $this->warehouse = new Warehouse($config,$this);
    }

    public function __call($name, $arguments)
    {
        return $this->warehouse->{$name}(...$arguments);
    }
}