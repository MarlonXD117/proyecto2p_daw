<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Crear Genero</h2>

<?php if (isset($error)): ?>
    <div class="alert-error"><?php echo $error; ?></div>
<?php endif; ?>

<div class="caja-formulario">
    <form action="?url=generos/crear" method="POST">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Guardar</button>
        <a href="?url=generos/listar">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
