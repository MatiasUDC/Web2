<?php require __DIR__ . '/../bibliotecas/Header.php'; ?>
<div class="form-group">
    <div class="col-md-8">
        <form method="post" action="Modificacion.php" id="formulario">
            <legend>Modificación</legend>
            <?php if (!empty(($errores))): ?>
                <div class="alert alert-warning">El formulario no puede ser procesado</div>
                <?php foreach ($errores as $error): ?>
                    <div class ="alert alert-warning"><?php echo $error; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="contact_form">
                <input type="hidden" name="id" value="<?php echo $id_cliente; ?>">    
            </div>

            <div class="contact_form">
                <label for="Modificacion">Apellido</label>
                <input value="<?php echo $results["apellido"]; ?>" name="apellido" type="Text" class="form-control" id="Apellido" aria-describedby="AyudaApellido" placeholder="Ingrese un Apellido">
                <small id="Apellido" class="form-text text-muted"></small>
            </div>
            <br>
            <div class="contact_form">
                <label for="Modificacion">Nombre</label>
                <input value="<?php echo $results["nombre"]; ?>" name="nombre" type="Text" class="form-control" id="Nombre" aria-describedby="AyudaNombre" placeholder="Ingrese un Nombre">
                <small id="Nombre" class="form-text text-muted"></small>
            </div>
            <br>
            <div class="contact_form">
                <label for="Modificacion">Fecha Nacimiento</label><br/>
                <input value="<?php echo $results["fecha_nacimiento"]; ?>" placeholder="Ingrese Fecha de Nacimiento" type="text" name="Nacimiento" id="Nacimiento">
            </div>
            <br>    
            <div class="contact_form">
                <label for="Formulario">Nacionalidad</label>
                <select placeholder="Nacionalidad" name="Nacionalidad" class="contact_form" id="Nacionalidad">
                    <?php foreach ($resultado as $value): ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['nacionalidad']; ?> </option>
                    <?php endforeach; ?></select>
            </div>
            <br>
            <div class="contact_form">
                <input value="<?php echo $results["activo"]; ?>" type="checkbox" name="Activo" value="Activo">Activo<br/><br/>
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary">Modificar</button>
            <br>
            <br>

        </form>
    </div>
</div>
<?php require __DIR__ . '/../bibliotecas/footer.php'; ?>

















<?php require __DIR__ . '/../bibliotecas/Header.php'; ?>

