<?php

namespace Lt\Bundle\MenuBundle\Renderer;

use Lt\Bundle\MenuBundle\Menu\ItemInterface;


interface ItemRendererInterface
{
    /**
     * Render a single menu item.
     * @param \Lt\Bundle\MenuBundle\Menu\ItemInterface $item
     * @param array $options
     */
    function renderItem(ItemInterface $item, array $options = array());

    /**
     * Return an array of default options used by the renderer.
     */
    function getItemDefaultOptions();
}
