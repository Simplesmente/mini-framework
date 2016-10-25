<?php

declare(strict_types=1);

namespace MeuFramework\Application;

use MeuFramework\Container\Container;

class Application
{
    /**
    * MeuFramework\Container\Container;
    */
    protected $container;

    /**
    * @return void
    */
    
    public function __construct()
    {
        $this->container = new Container;
    }

    /**
    * @return  MeuFramework\Container\Container
    */

    public function getContainer():Container
    {
        return $this->container;
    }

}