<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Agregar Pelicula</h2>

<?php if (isset($error)): ?>
    <div class="alert-error"><?php echo $error; ?></div>
<?php endif; ?>

<div class="caja-formulario">
    <form action="?url=peliculas/crear" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descripcion" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label>Año</label>
            <input type="number" name="anio_lanzamiento" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Genero</label>
            <select name="genero_id" class="form-control" required>
                <option value="">Seleccione</option>
                <?php foreach ($generos as $genero): ?>
                    <option value="<?php echo $genero['id']; ?>"><?php echo $genero['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn-primary">Guardar</button>
        <a href="?url=peliculas/listar">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
