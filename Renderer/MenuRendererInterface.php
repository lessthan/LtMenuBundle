<?php

namespace Lt\Bundle\MenuBundle\Renderer;

use Lt\Bundle\MenuBundle\Menu\MenuInterface;

/**
 *
 */
interface MenuRendererInterface
{
    /**
     * Render a menu structure.
     * @param \Lt\Bundle\MenuBundle\Menu\MenuInterface $menu
     * @param array $options
     */
    function renderMenu(MenuInterface $menu, array $options = array());

    /**
     * Return an array of default options used by the renderer.
     */
    function getMenuDefaultOptions();
}
