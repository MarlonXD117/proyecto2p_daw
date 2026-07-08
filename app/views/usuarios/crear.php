<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Crear Usuario</h2>

<?php if (isset($error)): ?>
    <div class="alert-error"><?php echo $error; ?></div>
<?php endif; ?>

<div class="caja-formulario">
    <form action="?url=usuarios/crear" method="POST">
        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn-primary">Guardar</button>
        <a href="?url=usuarios/listar">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
