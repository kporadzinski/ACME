<?php

class Product
{

    protected $id;
    protected $name;
    protected $price;
    protected $description;
    protected $category;
    protected $supply;
    public $dataBaseConnection;

    public function __construct($dataBaseConnection)
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

    public function getProductById($id = -1)
    {
        if($id == (-1)){
            $query = "SELECT * FROM `products`";
        }else{
            $query = "SELECT * FROM `products` WHERE `id` = $id";
        }
        $result = $this->dataBaseConnection->query($query);
        $booksArray = [];
        if(!$result){
            return NULL;
        } else {
            foreach($result as $row){
                $this->id = $row['id'];
                $this->setName($row['name']);
                $this->setPrice($row['price']); 
                $this->setDescription($row['description']);
                $this->setCategory($row['category']);
                $this->setSupply($row['supply']);
                $booksArray[] = $this->jsonSerialize();
            }
            return $booksArray;
            //return json_encode($booksArray);
        }
    }
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'category' => $this->category,
            'supply' => $this->supply
        ];
    }
    
    
    public function getProductByCategory($category = -1)
    {
        if($category == (-1)){
            $query = "SELECT * FROM `products`";
        }else{
            $query = "SELECT * FROM `products` WHERE `category` = $category";
        }
        $result = $this->dataBaseConnection->query($query);
        $booksArray = [];
        if(!$result){
            return NULL;
        } else {
            foreach($result as $row){
                $this->id = $row['id'];
                $this->setName($row['name']);
                $this->setPrice($row['price']); 
                $this->setDescription($row['description']);
                $this->setCategory($row['category']);
                $this->setSupply($row['supply']);
                $booksArray[] = $this->jsonSerialize();
            }
            return $booksArray;
            //return json_encode($booksArray);
        }
    }
    
    public function getProductPhotos($id = -1)
    {
        if($id == (-1)){
            $id = $this->id;
        }
        $query = "SELECT * FROM `photos` WHERE `product_id` = $id";
        $result = $this->dataBaseConnection->query($query);
        $booksArray = [];
        if(!$result){
            return NULL;
        } else {
            foreach($result as $row){
                $booksArray[] = $row['file_path'];
            }
            return $booksArray;
            //return json_encode($booksArray);
        }
    }
    
    public function addPhoto($id = -1)
    {
        if($id == (-1)){
            $id = $this->id;
        }
        $query = "INSERT INTO `acme`.`photos` (`id` ,`product_id` ,`file_path`) VALUES (NULL , '$id', '/photo3.jpg');";
        $result = $this->dataBaseConnection->query($query);
    }
    
    public function setId($id)//probably not to be used at all 
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
