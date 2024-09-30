<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        return view('productos.productosIndex');
    }

    public function agregar(){
        return view('productos.productosagregar');
    }
}
public function store() {
    include('db.php');
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id'];

    $query = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES ('$nombre', '$descripcion', '$precio', '$categoria_id')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: productos.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

