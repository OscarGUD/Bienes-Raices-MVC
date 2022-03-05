<div class="contenedor-anuncios">
            <?php foreach($propiedades as $propiedad){?>
            <div class="anuncio" data-cy="anuncio">
              
                    
                    <img src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Anuncio" loading="lazy"> 
                

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo;?></h3>
                    <p><?php echo $propiedad->descripccion;?>?</p>
                    <p class="precio">$<?php echo $propiedad->precio;?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc;?></p>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->estacionamiento;?></p>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p><?php echo $propiedad->habitaciones;?></p>
                        </li>
                    </ul>

                    <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Ver Propiedad</a>
                    
                </div> <!--Contenido-anuncio-->
            </div> <!--anuncio-->
            <?php }?>        
        </div> <!--Contendeor de los anuncios-->