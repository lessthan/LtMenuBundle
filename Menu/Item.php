<?php

namespace Lt\Bundle\MenuBundle\Menu;

use Lt\Bundle\MenuBundle\Menu\ItemInterface;

class Item implements ItemInterface
{
    protected $name;
    protected $label;
    protected $uri;
    protected $attributes;
    protected $active = false;
    protected $inActiveTrail = false;

    protected $menu;
    protected $parent;
    protected $children = array();

    function __construct($label, $attributes = array())
    {
        $this->label = $label;
        $this->attributes = $attributes;
    }

    function getMenu()
    {
        return $this->menu;
    }

    function setMenu(MenuInterface $menu)
    {
        $this->menu = $menu;
        return $this;
    }

    function getUri()
    {
        return $this->uri;
    }

    function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    function getLabel()
    {
        return $this->label;
    }

    function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    function getAttributes()
    {
        return $this->attributes;
    }

    function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    function getAttribute($name, $default = null)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : $default;
    }

    function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    function addChild(ItemInterface $child)
    {
        $child->setParent($this);
        $this->children[] = $child;

        return $child;
    }

    function getChild($name)
    {
    }

    function getChildren()
    {
        return $this->children;
    }

    function getParent()
    {
        return $this->parent;
    }

    function getLevel()
    {
        // TODO Implement
    }

    function getRoot()
    {
        if ($parent = $this->getParent()) {
            return $parent->getRoot();
        } else {
            return $this;
        }
    }

    function isRoot()
    {
        return $this->getParent() == $this;
    }

    function hasChildren()
    {
        return !empty($this->children);
    }

    function setParent($parent = null)
    {
        $this->parent = $parent;
    }

    function setActive($bool)
    {
        $this->active = true;
        $this->setInActiveTrail(true);
    }

    function isActive()
    {
        return $this->active;
    }

    function isInActiveTrail()
    {
        return $this->inActiveTrail;
    }

    function setInActiveTrail($bool)
    {
        if ($parent = $this->getParent()) {
            $parent->setInActiveTrail($bool);
        }
        $this->inActiveTrail = $bool;

        return $this;
    }

    function getDepth()
    {
        $max = 0;
        foreach ($this->children as $child) {
            $childDepth = $child->getDepth();
            if ($childDepth > $max) {
                $max = $childDepth;
            }
        }

        return $max;
    }
}
