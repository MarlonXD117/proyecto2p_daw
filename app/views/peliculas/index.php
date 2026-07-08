<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="header-actions">
    <h2>Catalogo de Peliculas</h2>

    <?php if ($_SESSION['usuario_rol'] == 'admin'): ?>
        <a href="?url=peliculas/crearForm" class="btn-primary">+ Nueva Pelicula</a>
    <?php endif; ?>
</div>

<?php if (count($peliculas) == 0): ?>
    <p>No hay peliculas registradas.</p>
<?php else: ?>
    <div class="movies-grid">
        <?php foreach ($peliculas as $pelicula): ?>
            <div class="movie-card" onclick="abrirDetalle(<?php echo $pelicula['id']; ?>)">
                <?php if ($pelicula['imagen'] != ""): ?>
                    <img src="<?php echo $pelicula['imagen']; ?>" class="movie-poster">
                <?php else: ?>
                    <div class="movie-poster" style="text-align:center; padding-top:120px;">Sin imagen</div>
                <?php endif; ?>

                <div class="movie-info">
                    <h3 class="movie-title"><?php echo $pelicula['titulo']; ?></h3>
                    <p class="movie-meta"><?php echo $pelicula['anio_lanzamiento']; ?> - <?php echo $pelicula['genero_nombre']; ?></p>
                    <p class="movie-description"><?php echo $pelicula['descripcion']; ?></p>
                    <p class="ver-mas">Clic para ver mas</p>

                    <?php if ($_SESSION['usuario_rol'] == 'admin'): ?>
                        <div class="movie-actions" onclick="event.stopPropagation()">
                            <a href="?url=peliculas/editarForm&id=<?php echo $pelicula['id']; ?>" class="btn-small btn-edit">Editar</a>
                            <a href="?url=peliculas/eliminar&id=<?php echo $pelicula['id']; ?>" class="btn-small btn-delete">Eliminar</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Informacion oculta para la ventana de detalle -->
            <div id="detalle-<?php echo $pelicula['id']; ?>" class="datos-pelicula" style="display:none;">
                <h2><?php echo $pelicula['titulo']; ?></h2>
                <?php if ($pelicula['imagen'] != ""): ?>
                    <img src="<?php echo $pelicula['imagen']; ?>" class="detalle-imagen">
                <?php endif; ?>
                <p><strong>Año:</strong> <?php echo $pelicula['anio_lanzamiento']; ?></p>
                <p><strong>Genero:</strong> <?php echo $pelicula['genero_nombre']; ?></p>
                <p><strong>Descripcion:</strong></p>
                <p><?php echo $pelicula['descripcion']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Ventana emergente de detalle -->
<div id="ventana-detalle" class="ventana-fondo" style="display:none;" onclick="cerrarDetalle()">
    <div class="ventana-contenido" onclick="event.stopPropagation()">
        <button class="btn-cerrar" onclick="cerrarDetalle()">X</button>
        <div id="contenido-detalle"></div>
    </div>
</div>

<script src="js/detalle.js?v=1"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
