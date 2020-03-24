<?php

class ProductController{
    public $categoriaURL;
    public $namePost;
    public $idURL;

    public function getAll(){
        require_once('models/ProductModel.php');
        
        $product = new Product();
        $all_products = $product->findAll();

        require_once('views/products/Product.getall.phtml');
    }

    public function save(){
        require_once('views/products/Product.save.phtml');
    }

    public function getCategory(){
        require_once('models/ProductModel.php');
        $this->categoriaURL = $_GET['cat'];

        $product = new Product();
        $all_products_by_category = $product->findCategory($this->categoriaURL);

        require_once('views/products/Product.getcategory.phtml');
    }

    public function getName(){
        require_once('models/ProductModel.php');
        $this->namePost = $_POST['name'];
        $product = new Product();
        $all_products_by_name = $product->findName($this->namePost);
        $cantidad = count($all_products_by_name);
        
        if ($cantidad > 0) {
            require_once('views/products/Product.getname.phtml');
        }else{
            require_once('views/products/Product.isnotproduct.phtml');
        }    
    }

    public function getId(){
        require_once('models/ProductModel.php');
        $this->idURL = $_GET['prod'];
        
        $product = new Product();
        $one_product = $product->findById($this->idURL);
    
        require_once('views/products/Product.getone.phtml');
    }
    
}

?>