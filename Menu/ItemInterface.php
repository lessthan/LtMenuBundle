<?php

namespace Lt\Bundle\MenuBundle\Menu;

use Lt\Bundle\MenuBundle\Menu\MenuInterface;

/**
 * Menu item interface.
 *
 * Represents a single item of a menu.
 */
interface ItemInterface
{
    /**
     * Get the URI of the item.
     *
     * @return string
     */
    function getUri();

    /**
     * Set the URI of the item.
     *
     * @param  string $uri The URI to set.
     * @return ItemInterface
     */
    function setUri($uri);

    /**
     * Get the label.
     *
     * @return string
     */
    function getLabel();

    /**
     * Set the label.
     *
     * @param  string $label The text to use as the label of the item.
     * @return ItemInterface
     */
    function setLabel($label);

    /**
     * Get a single attribute.
     *
     * @param  string $name     The name of the attribute to return.
     * @param  mixed  $default  The default value to return if the attribute doesn't exist.
     * @return mixed
     */
    function getAttribute($name, $default = null);

    /**
     * Set a single attribute.
     *
     * @param  string $name  The name of the attribute.
     * @param  mixed  $value The value to set.
     * @return ItemInterface
     */
    function setAttribute($name, $value);

    /**
     * Get an array of attributes (key-value pairs).
     * @return array
     */
    function getAttributes();

    /**
     * Set an array of attributes to the item.
     *
     * @param  array $attributes
     * @return ItemInterface
     */
    function setAttributes(array $attributes);

    /**
     * Return the menu this item belongs to.
     * @return MenuInterface
     */
    function getMenu();

    /**
     * Set the menu object this item belongs to.
     *
     * @param \Lt\Bundle\MenuBundle\Menu\MenuInterface $menu
     * @return ItemInterface
     */
    function setMenu(MenuInterface $menu);

    /**
     * Add a child menu item to this item.
     *
     * Returns the child item addded.
     *
     * @param ItemInterface $child The child item to attach to this item.
     * @return ItemInterface       The item child being added.
     */
    function addChild(ItemInterface $child);

    /**
     * Returns a named child.
     *
     * @param  string $name       Then name of the child item to return.
     * @return ItemInterface|null The child item or null if it does not exist.
     */
    function getChild($name);

    /**
     * Returns the parent of the menu item.
     *
     * @return \Lt\Bundle\MenuBundle\Menu\ItemInterface|null
     */
    function getParent();

    /**
     * Set the the parent of the menu item.
     *
     * @param \Lt\Bundle\MenuBundle\Menu\ItemInterface $parent
     * @return ItemInterface
     */
    function setParent($parent = null);

    /**
     * Set the menu item as active.
     *
     * @param boolean $bool
     * @return \Lt\Bundle\MenuBundle\Menu\ItemInterface
     */
    function setActive($bool);

    /**
     * Returns wheather this menu item is active or not.
     *
     * @return boolean
     */
    function isActive();

    /**
     * Returns wheather this menu item is in the active trail or not.
     *
     * @return boolean
     */
    function isInActiveTrail();

    /**
     * Set this item in the active trail and propagate to its parent item.
     *
     * @param $bool
     * @return \Lt\Bundle\MenuBundle\Menu\ItemInterface
     */
    function setInActiveTrail($bool);

    /**
     * Returns the level of this menu item in a menu items tree, starting from zero.
     *
     * @return integer
     */
    function getLevel();

    /**
     * Returns the (max) depth of children descendant from this item .
     *
     * @return integer
     */
    function getDepth();

    /**
     * Returns the top level (root) parent of this item.
     *
     * @return ItemInterface|null Returns the parent item or null if it has not a parent.
     */
    function getRoot();

    /**
     * Returns whether  this menu item is a root parent (i.e. it has not a parent item
     *
     * @return boolean
     */
    function isRoot();

    /**
     * Returns whether or not this menu items has enabled children
     *
     * @return boolean
     */
    function hasChildren();
}
