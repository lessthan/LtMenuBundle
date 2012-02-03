<?php

namespace Lt\Bundle\MenuBundle\Tests;

use Lt\Bundle\MenuBundle\Menu;

class MenuTreeTest extends \PHPUnit_Framework_TestCase
{
    protected $p1, $p2;
    protected $c11, $c12, $c21, $c22, $c23, $c111;

    protected function setUp()
    {
        $this->buildMenuTree();
    }

    public function testGetParent()
    {
        // Test if parents are set correctly.
        $this->assertSame($this->p1->getRoot(), $this->p1);
        $this->assertSame($this->p1->getRoot(), $this->p1);

        $this->assertSame($this->c11->getParent(), $this->p1);
        $this->assertSame($this->c12->getParent(), $this->p1);

        $this->assertSame($this->c21->getParent(), $this->p2);
        $this->assertSame($this->c22->getParent(), $this->p2);
        $this->assertSame($this->c23->getParent(), $this->p2);

        $this->assertSame($this->c111->getParent(), $this->c11);
    }


    public function testGetRoot()
    {
        // Test if the root element is determined correctly.
        $this->assertSame($this->p1->getRoot(), $this->p1);
        $this->assertSame($this->p2->getRoot(), $this->p2);

        $this->assertSame($this->c11->getRoot(), $this->p1);
        $this->assertSame($this->c12->getRoot(), $this->p1);

        $this->assertSame($this->c21->getRoot(), $this->p2);
        $this->assertSame($this->c22->getRoot(), $this->p2);
        $this->assertSame($this->c23->getRoot(), $this->p2);

        $this->assertSame($this->c111->getRoot(), $this->p1);
    }

    public function testHasChildren()
    {
        // Test if the root element is determined correctly.
        $this->assertTrue($this->p1->hasChildren());
        $this->assertTrue($this->p2->hasChildren());

        $this->assertTrue($this->c11->hasChildren());
        $this->assertFalse($this->c12->hasChildren());

        $this->assertFalse($this->c21->hasChildren());
        $this->assertFalse($this->c22->hasChildren());
        $this->assertFalse($this->c23->hasChildren());

        $this->assertFalse($this->c111->hasChildren());
    }

    public function testSetActive()
    {
        $this->c111->setActive(true);

        $this->assertTrue($this->c111->isActive());

        // Test if the activation get propagated until the top most level.
        $this->assertTrue($this->c111->isInActiveTrail());
        $this->assertTrue($this->c11->isInActiveTrail());
        $this->assertTrue($this->p1->isInActiveTrail());

        $this->assertFalse($this->p2->isInActiveTrail());
        $this->assertFalse($this->c12->isInActiveTrail());
        $this->assertFalse($this->c21->isInActiveTrail());
        $this->assertFalse($this->c22->isInActiveTrail());
        $this->assertFalse($this->c23->isInActiveTrail());
    }

    /**
     *         p.1             p.2
     *        /  \           /  |  \
     *     c.1.1 c.1.2  c.2.1 c.2.2 c.2.3
     *    /
     *   c.1.1.1
     *
     *
     */
    public function buildMenuTree()
    {
        $menu = new Menu\Menu('menuTree');

        // Top level.
        $this->p1 = $menu->addItem(new Menu\Item('p.1'));
        $this->p2 = $menu->addItem(new Menu\Item('p.2'));

        // First level (p1).
        $this->c11 = $this->p1->addChild(new Menu\Item('c.1.1'));
        $this->c12 = $this->p1->addChild(new Menu\Item('c.1.2'));

        // First level (p2).
        $this->c21 = $this->p2->addChild(new Menu\Item('c.2.1'));
        $this->c22 = $this->p2->addChild(new Menu\Item('c.2.2'));
        $this->c23 = $this->p2->addChild(new Menu\Item('c.2.3'));

        // Second level (c.1.1).
        $this->c111 = $this->c11->addChild(new Menu\Item('c.1.1'));
    }

}

