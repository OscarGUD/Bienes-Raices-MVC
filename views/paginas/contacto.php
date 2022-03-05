<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php if($mensaje){ ?>
            <p class=" alerta exito"> <?php echo $mensaje; ?>  </p>
        <?php } ?>
            
            
        ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen Formulario" loading='lazy'>
        </picture>

        <h2>LLene el formulario de contacto</h2>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje</label>
                <textarea id="" cols="30" rows="10" id='mensaje' placeholder="Tu Mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Sobre la Propiedad</legend>

                <label for="opcciones">Vende o Compra</label>
                <select id="opcciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Selecciona --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                    <label for="contactar-E-mail">E-mail</label>
                    <input type="radio" value="email" id="contactar-E-mail" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>