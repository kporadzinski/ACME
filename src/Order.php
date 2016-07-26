<?php

class Order
{
    const UNORDERED = 0;
    const ORDERED = 1;
    const PAYED = 2;
    const REALIZED = 3;
    
    public $id;
    public $user_id;
    public $status;
    public $products;
    
    public function __construct()
    {
       $this->products = [];
    }
    
    function getId()
    {
        return $this->id;
    }

    function getUser_id()
    {
        return $this->user_id;
    }

    function getStatus()
    {
        return $this->status;
    }

    function getProducts()
    {
        return $this->products;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function setStatus($status)
    {
        $this->status = $status;
    }

    function setProducts($products)
    {
        $this->products = $products;
    }

    public function addToBasket()
    {
        if($this->status == UNORDERED){//once you order you cannot add more product, you have to make another order
            
        }
    }
    
    
}