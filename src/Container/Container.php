<?php

declare(strict_types=1);

namespace MeuFramework\Container;

use ArrayAccess;

/**
* @author André Teles
*/

class Container implements ArrayAccess
{
    protected $items = [];

    protected $cache = [];
   
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    /**
	 * @return Callble 
	 * @param string $offset 
	*/

    public function offsetGet($offset)
    {
        if( !$this->has($offset) ){
            return false;
        }

        $item = $this->items[$offset]($this);

        return $item;
    }

    /**
	 * @return void 
	 * @param string $offset 
	*/

    public function offsetUnset($offset)
    {
        if( $this->has($offset) ){
            unset($this->items[$offset]);
        }
    }

    /**
	 * @return void 
	 * @param string $offset 
	*/

    public function offsetExists($offset)
    {
        return isset( $this->items[$offset] );
    }
    
    private function has(string $offset):bool
    {
        return $this->offsetExists($offset);
    }

    public function __get( string $property)
    {
        return $this->offsetGet($property);
    }

}