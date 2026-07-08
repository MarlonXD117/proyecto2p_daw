<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Genero</h2>

<div class="caja-formulario">
    <form action="?url=generos/actualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $genero['id']; ?>">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $genero['nombre']; ?>" required>
        </div>

        <button type="submit" class="btn-primary">Actualizar</button>
        <a href="?url=generos/listar">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
