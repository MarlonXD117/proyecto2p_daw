<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Usuario</h2>

<div class="caja-formulario">
    <form action="?url=usuarios/actualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="username" class="form-control" value="<?php echo $usuario['username']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option value="user" <?php if ($usuario['rol'] == 'user') echo "selected"; ?>>Usuario</option>
                <option value="admin" <?php if ($usuario['rol'] == 'admin') echo "selected"; ?>>Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nueva Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Dejar vacio si no quieres cambiarla">
        </div>

        <button type="submit" class="btn-primary">Actualizar</button>
        <a href="?url=usuarios/listar">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
