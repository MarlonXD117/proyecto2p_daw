<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="header-actions">
    <h2>Generos</h2>
    <a href="?url=generos/crearForm" class="btn-primary">+ Nuevo Genero</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($generos as $genero): ?>
        <tr>
            <td><?php echo $genero['id']; ?></td>
            <td><?php echo $genero['nombre']; ?></td>
            <td>
                <a href="?url=generos/editarForm&id=<?php echo $genero['id']; ?>" class="btn-small btn-edit">Editar</a>
                <a href="?url=generos/eliminar&id=<?php echo $genero['id']; ?>" class="btn-small btn-delete">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
