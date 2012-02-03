<?php

namespace Lt\Bundle\MenuBundle\Tests;

use Lt\Bundle\MenuBundle\Menu;

class MenuTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    public function testCreate()
    {
        $menu = new Menu\Menu('mainMenu');

        $this->assertInstanceOf('Lt\Bundle\MenuBundle\Menu\Menu', $menu);
        $this->assertEquals('mainMenu', $menu->getName());
    }

    public function testAddItem()
    {
        $menu = new Menu\Menu('mainMenu');

        $item  = $menu->addItem(new Menu\Item('1ss Item', array()));
        $this->assertSame($menu, $item->getMenu());
        $this->assertNull($item->getParent());

        $menu->addItem(new Menu\Item('2nd Item', array()));
        $menu->addItem(new Menu\Item('3rd Item', array()));

        $this->assertEquals(3, count($menu->getItems()));
    }

    public function testGetItems()
    {
        $menu = new Menu\Menu('mainMenu');

        $total = rand(5, 10);
        for ($i = 0; $i < $total; $i++) {
            $menu->addItem(new Menu\Item(sprintf('Item %d', $i), array()));
        }

        $items = $menu->getItems();
        $this->assertEquals($total, count($items));
        foreach ($items as $item) {
            $this->assertInstanceOf('Lt\Bundle\MenuBundle\Menu\ItemInterface', $item);
        }
    }

    public function testItemsIterator()
    {
        $menu = new Menu\Menu('mainMenu');

        $total = rand(5, 10);
        for ($i = 0; $i < $total; $i++) {
            $menu->addItem(new Menu\Item(sprintf('Item %d', $i), array()));
        }

        foreach ($menu as $item) {
            $this->assertInstanceOf('Lt\Bundle\MenuBundle\Menu\ItemInterface', $item);
        }
    }

    public function testCountable()
    {
        $menu = new Menu\Menu('mainMenu');

        $total = rand(5, 10);
        for ($i = 0; $i < $total; $i++) {
            $menu->addItem(new Menu\Item(sprintf('Item %d', $i), array()));
        }

        $this->assertEquals($total, count($menu));
    }

    public function testAttributesInConstructor()
    {
        $menu = new Menu\Menu('mainMenu', array('title' => 'Main menu', 'class' => array('nav', 'main')));

        $this->assertTrue(is_array($menu->getAttributes()));
        $this->assertArrayHasKey('title', $menu->getAttributes());
        $this->assertTrue(is_array($menu->getAttribute('class')));
        $this->assertEquals('Main menu', $menu->getAttribute('title'));
    }

    public function testAttributes()
    {
        $menu = new Menu\Menu('mainMenu');

        $menu->setAttribute('title', 'The title');
        $this->assertEquals('The title', $menu->getAttribute('title'));

        $menu->setAttribute('class', array('nav', 'main'));
        $this->assertEquals(array('nav', 'main'), $menu->getAttribute('class'));
    }
}

