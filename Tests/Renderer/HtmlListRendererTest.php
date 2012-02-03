<?php

namespace Lt\Bundle\MenuBundle\Tests\Renderer;

use Lt\Bundle\MenuBundle\Menu;
use Lt\Bundle\MenuBundle\Renderer\HtmlListRenderer;

class HtmlListRendererTest extends \PHPUnit_Framework_TestCase
{
    protected $menu;
    protected $p1, $p2;
    protected $c11, $c12, $c21, $c22, $c23, $c111;

    protected function setUp()
    {
        $this->buildMenuTree();
    }

    public function testRendering()
    {
        $renderer = new HtmlListRenderer();
        $html = $renderer->renderMenu($this->menu);
        $this->markTestIncomplete();
    }

    /**
     *  Menu tree.
     *
     *         p.1             p.2
     *        /  \           /  |  \
     *     c.1.1 c.1.2  c.2.1 c.2.2 c.2.3
     *    /
     *   c.1.1.1
     *
     */
    public function buildMenuTree()
    {
        $this->menu = new Menu\Menu('menuTree');

        // Top level.
        $this->p1 = $this->menu->addItem(new Menu\Item('p.1'));
        $this->p2 = $this->menu->addItem(new Menu\Item('p.2'));

        // First level (p1).
        $this->c11 = $this->p1->addChild(new Menu\Item('c.1.1'));
        $this->c12 = $this->p1->addChild(new Menu\Item('c.1.2'));

        // First level (p2).
        $this->c21 = $this->p2->addChild(new Menu\Item('c.2.1'));
        $this->c22 = $this->p2->addChild(new Menu\Item('c.2.2'));
        $this->c23 = $this->p2->addChild(new Menu\Item('c.2.3'));

        // Second level (c.1.1).
        $this->c111 = $this->c11->addChild(new Menu\Item('c.1.1.1'));
    }
}