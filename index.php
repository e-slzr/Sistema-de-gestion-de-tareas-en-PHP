<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Añadiremos el CSS más adelante -->
</head>
<body>
    <h1>Lista de Tareas</h1>

    <!-- Aquí se mostrarán las tareas -->
    <div id="task-list">
        <p>No hay tareas todavía.</p>
    </div>

    <!-- Formulario para agregar tareas -->
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Escribe una tarea" required>
        <button type="submit">Agregar Tarea</button>
    </form>
</body>
</html>
