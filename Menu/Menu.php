<?php

namespace Lt\Bundle\MenuBundle\Menu;

use Lt\Bundle\MenuBundle\Menu\MenuInterface;
use Lt\Bundle\MenuBundle\Menu\ItemInterface;

class Menu implements MenuInterface
{
    protected $name;
    protected $attributes;
    protected $items;

    public function __construct($name, $attributes = array())
    {
        $this->name = $name;
        $this->attributes = $attributes;
    }

    public function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    public function addItem(ItemInterface $item)
    {
        if (! $item instanceof ItemInterface) {
            throw new \InvalidArgumentException(sprintf('Invalid item added to %s menu', $this->name));
        }

        $item->setMenu($this)->setParent(null);
        $this->items[] = $item;

        return $item;
    }

    function getItems()
    {
        return $this->items;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function count()
    {
        return count($this->items);
    }

    function getAttributes()
    {
        return $this->attributes;
    }

    function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    function getAttribute($name, $default = null)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : $default;
    }

    function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    function getDepth()
    {
        $max = 0;
        foreach ($this->items as $item) {
            $childDepth = $item->getDepth();
            if ($childDepth > $max) {
                $max = $childDepth;
            }
        }

        return $max;
    }


}
