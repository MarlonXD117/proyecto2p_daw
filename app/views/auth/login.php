<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - PeliStream</title>
    <link rel="stylesheet" href="css/style.css?v=3">
</head>
<body>
    <div class="auth-container">
        <div class="auth-form-card">
            <h2>Iniciar Sesion</h2>

            <?php if (isset($error)): ?>
                <div class="alert-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="?url=auth/login" method="POST">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn-primary">Entrar</button>
            </form>
        </div>
    </div>
    <script src="js/validations.js?v=3"></script>
</body>
</html>
