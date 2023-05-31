<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use src\model\Cart;

class CartTest extends TestCase{
    public function testCartEmpty(){
        $cart = new Cart;
        $this->assertempty($cart->getCart());
    }
}