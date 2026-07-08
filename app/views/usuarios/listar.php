<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>

<body>

    <h1>Listado de usuarios</h1>

    <p><a href="index.php?url=usuarios/crearForm">Crear usuario</a></p>

    <table border="1" cellpadding="6">

        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u["id"]) ?></td>
                <td><?= htmlspecialchars($u["usuario"]) ?></td>
                <td><?= htmlspecialchars($u["correo"]) ?></td>
                <td>
                    <a href="index.php?url=usuarios/editarForm&id=<?= $u["id"] ?>">Editar</a>
                    <a href="index.php?url=usuarios/eliminar&id=<?= $u["id"] ?>"
                        onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                </td>


            </tr>

        <?php endforeach; ?>



    </table>

</body>

</html>