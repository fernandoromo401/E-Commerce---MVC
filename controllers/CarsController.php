<?php

class CarsController{

    public $id_new;
    public $all_car = [];

    public function addToCars(){
        require_once('models/CarsModel.php');
        $this->id_new = $_GET['prod'];
        
        if (!$_SESSION["carrito"]) {
            $_SESSION["carrito"] = [];
            
            if ($this->id_new != 'undefined') {
                array_push($_SESSION["carrito"],$this->id_new); 
                
            }            
        }
        else{
            
            array_push($_SESSION["carrito"],$this->id_new);
            
        }
        $this->all_car = $_SESSION["carrito"];

        $product = new Cars();
        $products = $product->findById($this->all_car);

        
        
        require_once('views/cars/Cars.fav.phtml');
        
        
    }

    public function addToCars2(){
        require_once('models/CarsModel.php');
        $this->id_new = $_GET['prod'];
        
        if (!$_SESSION["carrito"]) {
            $_SESSION["carrito"] = [];
            
            if ($this->id_new != 'undefined') {
                array_push($_SESSION["carrito"],$this->id_new); 
                
            }            
        }
        else{
            
            array_push($_SESSION["carrito"],$this->id_new);
            
        }
        $this->all_car = $_SESSION["carrito"];

        $product = new Cars();
        $products = $product->findById($this->all_car);
        
        
        header('Location: ./?route=getAll');
        
    }

    public function addToCars3(){
        require_once('models/CarsModel.php');
        $this->id_new = $_GET['prod'];
        
        if (!$_SESSION["carrito"]) {
            $_SESSION["carrito"] = [];
            
            if ($this->id_new != 'undefined') {
                array_push($_SESSION["carrito"],$this->id_new); 
                
            }            
        }
        else{
            
            array_push($_SESSION["carrito"],$this->id_new);
            
        }
        $this->all_car = $_SESSION["carrito"];

        $product = new Cars();
        $products = $product->findById($this->all_car);
        
        
        header('Location: ./?route=car');
        
    }
    
    public function detroyCar(){
        session_unset();
        session_destroy();
        header('Location: ./?route=car');
        
    }

    public function removeToCars(){
        require_once('models/CarsModel.php');

        $this->id_new = $_GET['prod'];

        for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
            if ($_SESSION['carrito'][$i] == $this->id_new) {
                unset($_SESSION['carrito'][$i]);
                header('Location: ./?route=car');  
                break;
                
            }
        }       
        header('Location: ./?route=car');        
    }  

    public function purchase(){
        
        $purchase = $_SESSION['payment'];
        if ($purchase['pay'] > 0) {
            require_once('views/cars/Cars.form.pay.html');
        }
        else{
            header('Location: ./?getAll');
        }

        

    }
}

?>