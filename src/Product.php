<?php

class Product
{

    protected $id;
    protected $name;
    protected $price;
    protected $description;
    protected $category;
    protected $supply;
    protected $dataBaseConnection;

    public function construct($dataBaseConnection)
    {
        $this->id = -1;
        $this->dataBaseConnection = $dataBaseConnection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getSupply()
    {
        return $this->supply;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setSupply($supply)
    {
        $this->supply = $supply;
    }

    public function dropProduct()
    {
        $query = "DELETE FROM `acme`.`products` WHERE `products`.`id` = {$this->id};";
        $this->dataBaseConnection = $conn->query($query);
    }

    public function addProduct()
    {
        $query = "INSERT INTO `acme`.`products` (`id`,`name`,`price`,`description`,`category`,`supply`)
VALUES (NULL,'{$this->name}','{$this->price}',{$this->description},{$this->category},{$this->supply});";
        $this->dataBaseConnection = $conn->query($query);
    }

    public function updateProduct()
    {
        $query = "UPDATE `acme`.`products` SET `name` = '{$this->produkt}',`price` = '{$this->description}', `description` = '{$this->description}',
 `category` = '{$this->category}', `supply` = '{$this->supply}' WHERE `products`.`id` ={$this->id};";
        $this->dataBaseConnection = $conn->query($query);
    }

}
