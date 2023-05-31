<?php

namespace src\Model;
use src\model\Product;

class Cart {
    private array $produtos = [];

    public function add(Product $product){
        $this->produtos[] = $product;
    }

    public function getCart(){
        return $this->produtos;
    }
}