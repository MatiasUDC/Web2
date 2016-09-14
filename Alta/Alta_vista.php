<?php require_once __DIR__ . '/../bibliotecas/Header.php'; ?>
<div class="form-group">
    <div class="col-md-8">
        <form method="post" action="Alta.php" id="formulario">
            <legend>Alta</legend>
            <?php if (!empty(($errores))): ?>
                <div class="alert alert-warning">El formulario no puede ser procesado</div>
                <?php foreach ($errores as $error): ?>
                    <div class ="alert alert-warning"><?php echo $error; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>    
            <div class="contact_form">
                <label for="Alta">Apellido</label>
                <input name="apellido" type="Text" class="form-control" id="Apellido" aria-describedby="AyudaApellido" placeholder="Ingrese un Apellido">
                <small id="Apellido" class="form-text text-muted"></small>
            </div>
            <br>
            <div class="contact_form">
                <label for="Alta">Nombre</label>
                <input name="nombre" type="Text" class="form-control" id="Nombre" aria-describedby="AyudaNombre" placeholder="Ingrese un Nombre">
                <small id="Nombre" class="form-text text-muted"></small>
            </div>
            <br>
            <div class="contact_form">
                <label for="Alta">Fecha Nacimiento</label><br/>
                <input placeholder="Ingrese Fecha de Nacimiento" type="text" name="Nacimiento" id="Nacimiento">
            </div>
            <br>    
            <div class="contact_form">
                <label for="Formulario">Nacionalidad</label>
                <select placeholder="Nacionalidad" name="Nacionalidad" class="contact_form" id="Nacionalidad">
                    <?php foreach ($results as $value): ?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['nacionalidad']; ?> </option>
                    <?php endforeach; ?></select>
            </div>
            <br>
            <div class="contact_form">
                <input type="checkbox" name="Activo" value="Activo">Activo<br/><br/>
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary">Registrar</button>
            <br>
            <br>

        </form>
    </div>
</div>
<?php require_once __DIR__ . '/../bibliotecas/footer.php'; ?>