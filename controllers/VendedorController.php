<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedores;

class VendedorController{
    public static function crear(Router $router){
        $vendedor = new Vendedores;
        $errores = Vendedores::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Crear una nueva instancia
            $vendedor = new Vendedores($_POST['vendedor']);
        
            // validar que no haya campos vacios
            $errores = $vendedor->validar();
        
            // No hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' =>$vendedor
        ]);
    }
    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');
        $errores = Vendedores::getErrores();
        $vendedor = Vendedores::find($id);


        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Asignar los valores
            $args = $_POST['vendedor'];
        
            // Sincronizar objeto en memoria
            $vendedor->sincronizar($args);
        
            // Validacion
            $errores = $vendedor->validar();
        
            if(empty($errores)){
                $vendedor->guardar();
            }
        
        }

        $router->render('vendedores/actualizar',[
            'vendedor' => $vendedor,
            'errores' => $errores

        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];
    
                if(validatTipoContenido($tipo)){
                    $vendedor = Vendedores::find($id);
                    $vendedor->Eliminar();
                } 
            }
        }
    }

}

