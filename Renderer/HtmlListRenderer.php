<?php

namespace Lt\Bundle\MenuBundle\Renderer;

use Lt\Bundle\MenuBundle\Menu\MenuInterface;
use Lt\Bundle\MenuBundle\Menu\ItemInterface;
use Lt\Bundle\MenuBundle\Renderer\MenuRendererInterface;
use Lt\Bundle\MenuBundle\Renderer\ItemRendererInterface;

class HtmlListRenderer implements MenuRendererInterface, ItemRendererInterface
{
    function renderMenu(MenuInterface $menu, array $options = array())
    {
        $html = '<ul class="nav">';
        foreach ($menu as $item) {
            $class = array();
            if ($item->isInActiveTrail()){
                $class[] = 'active-trail';
            }
            if ($item->isActive()) {
                $class[] = 'active';
            }
            $class = implode(' ', $class);

            $html .= '<li class="' . $class .' ">' . $this->renderItem($item) . '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    function renderLink(ItemInterface $item) {
        return sprintf('<a href="%s">%s</a>', $item->getUri(), $item->getLabel());
    }

    function getMenuDefaultOptions()
    {
        return array();
    }

    function renderItem(ItemInterface $item, array $options = array())
    {
        $html = $this->renderLink($item);
        if ($item->hasChildren()) {
            $html .=  '<ul class="subnav nav">';
            foreach ($item->getChildren() as $child) {
                $class = array();
                if ($child->isInActiveTrail()){
                    $class[] = 'active-trail';
                }
                if ($child->isActive()) {
                    $class[] = 'active';
                }
                $class = implode(' ', $class);

                $html .= '<li class="' . $class . ' ">' . $this->renderItem($child) . '</li>';
            }
            $html .= '</ul>';
        }

        return $html;
    }

    function getItemDefaultOptions()
    {
        return array();
    }


}