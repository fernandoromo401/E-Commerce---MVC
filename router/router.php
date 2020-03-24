<?php
$controladorProducto = new ProductController();
$controladorCarrito = new CarsController();

switch ($_GET['route']) {
    case '':
        $controladorProducto->getAll();
        break;

    case 'getAll':
        $controladorProducto->getAll();
        break;
    
    case 'getCategory':
        $controladorProducto->getCategory();
        break;    
    
    case 'getName':
        $controladorProducto->getName();
        break;  

    case 'save':
        $controladorProducto->save();
        break;
    
    case 'item':
        $controladorProducto->getId();
        break;

    case 'car':
        $controladorCarrito->addToCars();
        break;
    
    case 'car2':
        $controladorCarrito->addToCars2();
        break;
        
    case 'car3':
        $controladorCarrito->addToCars3();
        break;

    case 'deleteCar':
        $controladorCarrito->detroyCar();
        break;
    
    case 'deleteProd':
        $controladorCarrito->removeToCars();
        break;

    case 'purchase':
        $controladorCarrito->purchase();
        break;
        
    default:
        echo 'Ingresar una ruta Valida';
        break;
}
?>