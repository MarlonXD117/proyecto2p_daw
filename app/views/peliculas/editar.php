<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Pelicula</h2>

<div class="caja-formulario">
    <form action="?url=peliculas/actualizar" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $pelicula['id']; ?>">

        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo $pelicula['titulo']; ?>" required>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descripcion" class="form-control" rows="4" required><?php echo $pelicula['descripcion']; ?></textarea>
        </div>

        <div class="form-group">
            <label>Año</label>
            <input type="number" name="anio_lanzamiento" class="form-control" value="<?php echo $pelicula['anio_lanzamiento']; ?>" required>
        </div>

        <div class="form-group">
            <label>Genero</label>
            <select name="genero_id" class="form-control" required>
                <?php foreach ($generos as $genero): ?>
                    <option value="<?php echo $genero['id']; ?>" <?php if ($pelicula['genero_id'] == $genero['id']) echo "selected"; ?>>
                        <?php echo $genero['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Nueva imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn-primary">Actualizar</button>
        <a href="?url=peliculas/listar">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
