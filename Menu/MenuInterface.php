<?php

namespace Lt\Bundle\MenuBundle\Menu;

/**
 * Menu interface.
 *
 * Represents a menu tree composed of menu items.
 */
interface MenuInterface extends \IteratorAggregate, \Countable
{
    function setName($name);
    function getName();

    /**
     * Add an item to the menu.
     *
     * @param ItemInterface $item The item to add.
     * @return ItemInterface
     */
    function addItem(ItemInterface $item);

    function getItems();

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
     * Returns the depth of the menu.
     *
     * @return integer
     */
    function getDepth();
}
