<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{
    public static function index(Router $router){
        $vendedores = Vendedores::all();
        $propiedades = Propiedad::all();
        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'vendedores' => $vendedores,
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedor = Vendedores::all();
        // Array con mensajes de errores
        $errores = Propiedad::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /**Crea una nueva instancia */
            $propiedad = new Propiedad($_POST['propiedad']);

            /*SUBIDA DE ARCHIVOS*/
            // Crear carpeta
            $carpetaImagenes = '../../imagenes';


            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            };

            //Ganerar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true).".jpg");

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
            // Validar    
            $errores = $propiedad->validar();    
            
            // Revisar que el array de errores este vacio
            if (empty($errores)) { 
                
                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $propiedad->guardar();     
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        // Array con mensajes de errores
        $errores = Propiedad::getErrores();
        $vendedor = Vendedores::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Asignar los atributos
            $args = $_POST['propiedad'];
            
            $propiedad->sincronizar($args);
    
            // Validacion
            $errores = $propiedad->validar();
    
            //Ganerar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true).".jpg");
    
            // Subida de archivos
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
        
            // Revisar que el array de errores este vacio
            if (empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                } 
                $propiedad->guardar(); 
            }   
        }

        $router->render('/propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedor
        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];
    
                if(validatTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->Eliminar();
                } 
            }
        }
    }
}