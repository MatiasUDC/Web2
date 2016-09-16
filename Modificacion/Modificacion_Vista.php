<?php require_once __DIR__ . '/../bibliotecas/Header.php';
    if($_SESSION['UPDATE'] != true ) {
         header('Location: ../login/denegado.php');
        die();
    }
?>
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
                <input id="apeliido" value="<?php echo $results["apellido"]; ?>" name="apellido" type="Text" class="form-control" id="Apellido" aria-describedby="AyudaApellido" placeholder="Ingrese un Apellido">
                <small id="apellido" class="form-text text-muted"></small>
            </div>
            <br>
            <div class="contact_form">
                <label for="Modificacion">Nombre</label>
                <input id="nombre" value="<?php echo $results["nombre"]; ?>" name="nombre" type="Text" class="form-control" id="Nombre" aria-describedby="AyudaNombre" placeholder="Ingrese un Nombre">
                <small id="nombre" class="form-text text-muted"></small>
            </div>
            <br>
            <div class="contact_form">
                <label for="Modificacion">Fecha Nacimiento</label><br/>
                <input value="<?php echo $results["fecha_nacimiento"]; ?>" placeholder="Ingrese Fecha de Nacimiento" type="text" name="Nacimiento" id="nacimiento">
            </div>
            <br>    
            <div class="contact_form">
                <label for="Formulario">Nacionalidad</label>
                <select placeholder="Nacionalidad" name="Nacionalidad" class="contact_form" id="nacionalidad">
                    <optgroup>
                        <option value="<?php echo $results["nacionalidad_id"];?>"><?php echo $results["nacionalidad"];?></option>>
                    </optgroup> 
                    <optgroup label="-------------------------------------">
                        <?php foreach ($resultado as $value): ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['nacionalidad']; ?></option>
                    <?php endforeach; ?>
                    </optgroup>
                </select>
                    
            </div>
            <br>
            <div class="contact_form">
                <input value="<?php echo $results["activo"] ?>" type="checkbox" id="activo" name="Activo">Activo<br/><br/>
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary">Modificar</button>
            <br>
            <br>

        </form>
    </div>
</div>
<?php require __DIR__ . '/../bibliotecas/footer.php'; ?>
