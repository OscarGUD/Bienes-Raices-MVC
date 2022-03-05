<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Secion</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach?>    

        <form action="/login" class="formulario" method="POST">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input name="email" type="email" placeholder="Tu email" id="email">
 
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Tu Password" id="password">

            </fieldset>

            <input type="submit" value="Iniciar Secion" class="boton boton-verde">
        </form>

    </main>