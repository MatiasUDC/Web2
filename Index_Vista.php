<!doctype html>
<?php
require_once __DIR__ . '\bibliotecas\Header.php';
require_once __DIR__ . '\login\control_session.php';
if (!array_key_exists('contador', $_SESSION)) {
    $_SESSION['contador'] = 0;
}
$_SESSION['contador'] = $_SESSION['contador'] + 1;
?>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (array_key_exists('nombre_usuario', $_SESSION)) {
                                echo $_SESSION['nombre_usuario'];
                            }
                            ?>
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="glyphicon glyphicon-triangle-bottom"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="login/cerrar_session.php">Cerrar Session</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="form-group">
        <legend>Clientes</legend><a class="btn btn-primary" <?php if($_SESSION['INSERT'] !== true){echo 'disabled';} ?> href="Alta\alta.php">Nuevo Cliente</a><br/><br/>

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
                        <td><a class="btn btn-primary" <?php if($_SESSION['UPDATE'] !== true){echo 'disabled';} ?> href="Modificacion/modificacion.php?id=<?php echo $value['id'] ?>">Modificar</a></td>
                        <td><a class="btn btn-danger" <?php if($_SESSION['DELETE'] !== true){echo 'disabled';} ?> href="Baja/baja.php?id=<?php echo $value['id'] ?>">Baja</a></td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
        <div class="col-md-8">
            <p>Has visitado esta pagina : <?php echo $_SESSION['contador']; ?> veces</p>
            <a class="btn btn-primary" href="login/cerrar_session.php">Cerrar Sesion</a>
        </div>
    </div>

</div>


<?php require_once __DIR__ . '\bibliotecas\footer.php'; ?>
