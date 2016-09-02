<?php require __DIR__ . '/../bibliotecas/Header.php'; ?>
<div class="container">
    <div class="col-md-8">
        <?php if ($results == null): ?>
            <div class="alert alert-warning">Error en Creacion de Cliente</div>
        <?php else: ?>
            <div class="alert alert-info">Exito en Creacion de Cliente</div>
        <?php endif; ?>
        <br/>
        <a class="btn btn-primary" href="../Index.php">Pagina Inicio</a>


    </div>

</div>
<?php require __DIR__ . '/../bibliotecas/footer.php'; ?>

