<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="header-actions">
    <h2>Usuarios</h2>
    <a href="?url=usuarios/crearForm" class="btn-primary">+ Nuevo Usuario</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['username']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['rol']; ?></td>
            <td>
                <a href="?url=usuarios/editarForm&id=<?php echo $usuario['id']; ?>" class="btn-small btn-edit">Editar</a>

                <?php if ($usuario['id'] != $_SESSION['usuario_id']): ?>
                    <a href="?url=usuarios/eliminar&id=<?php echo $usuario['id']; ?>" class="btn-small btn-delete">Eliminar</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
