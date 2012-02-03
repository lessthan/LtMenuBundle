<?php

namespace Lt\Bundle\MenuBundle\Renderer;

use Lt\Bundle\MenuBundle\Menu\ItemInterface;

class TwigRenderer implements RendererInterface
{
    public function __construct()
    {
    }

    public function render(ItemInterface $item, array $options = array())
    {
    }

    private function getDefaultOptions()
    {
        return array();
    }
}