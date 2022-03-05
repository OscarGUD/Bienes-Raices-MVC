<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo?></h1>
    
        <img src="/imagenes/<?php echo $propiedad->imagen?>" alt="Imagen Destacada" loading='lazy'>
    
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc?></p>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento?></p>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad->habitaciones?></p>
                </li>
            </ul>

            <p><?php echo $propiedad->descripccion?></p>
        </div>
</main>