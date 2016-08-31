<!doctype html>
<?php require __DIR__ . '\bibliotecas\Header.php'; ?>
<div class="container">

    <div class="form-group">
        <legend>Clientes</legend><a class="btn btn-primary" href="Alta\alta.php">Nuevo Cliente</a><br/><br/>

        <!--<?php if (!empty(($errores))): ?>
                                            <div class="alert alert-warning">El formulario no puede ser procesado</div>
            <?php foreach ($errores as $error): ?>
                    <div class ="alert alert-warning"><?php echo $error; ?></div>
            <?php endforeach; ?>
        <?php endif; ?>   
        -->
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>Nombre</td>
                    <td>Edad</td>
                    <td>Activo</td>
                    <td>Nacionalidades</td>
                    <td></td>
                    <td></td>
                </tr>

                <?php foreach ($results as $value): ?>
                    <tr>
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['edad']; ?></td>
                        <?php if ($value['activo']): ?>
                            <td><input type="checkbox" class="checkbox" name="activo" checked disabled></td>
                        <?php else: ?>
                            <td><input type="checkbox"class="checkbox" name="activo" disabled></td>
                        <?php endif; ?>
                        <td><?php echo $value['nacionalidad']; ?></td>
                        <td><a class="btn btn-primary" href="Modificacion/modificacion.php?id=<?php echo $value['id'] ?>">Modificar</a></td>
                        <td><a class="btn btn-danger" href="Baja/baja.php?id=<?php echo $value['id'] ?>">Baja</a></td>
                    </tr>
                <?php endforeach; ?> 

            </table>
        </div>

    </div>
</div>


<?php require __DIR__ . '\bibliotecas\footer.php'; ?>
