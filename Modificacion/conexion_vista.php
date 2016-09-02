<?php require __DIR__ . '/../bibliotecas/Header.php'; ?>
<div class="container">
    <div class="col-md-8">
        <?php if ($stmt == null): ?>
            <div class="alert alert-warning">Error en Actulizacion de Cliente</div>
        <?php else: ?>
            <div class="alert alert-info">Exito en Actualizacion de Cliente</div>
        <?php endif; ?>
        <br/>
        <a class="btn btn-primary" href="../Index.php">Pagina Inicio</a>


    </div>

</div>
<?php require __DIR__ . '/../bibliotecas/footer.php'; ?>
