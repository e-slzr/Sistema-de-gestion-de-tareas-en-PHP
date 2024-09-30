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
    <?php
// Verifica si el archivo JSON ya existe
if (file_exists($file)) {
    // Lee el archivo JSON y decodifica su contenido a un array
    $jsonData = file_get_contents($file);
    $tasks = json_decode($jsonData, true);

    // Si hay tareas, las mostramos
    if (!empty($tasks)) {
        echo '<ul>'; 
        foreach ($tasks as $index => $task) {
            $taskName = htmlspecialchars($task['task']);
            $completed = $task['completed'] ? ' (Completada)' : '';

            // Añadimos botones para marcar como completada y eliminar
            echo "<li>$taskName$completed 
                    <form action='complete_task.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit'>Marcar como Completada</button>
                    </form>
                    <form action='delete_task.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit'>Eliminar</button>
                    </form>
                    </li>";
                }
                echo '</ul>';
            } else {
                echo '<p>No hay tareas todavía.</p>';
            }
        } else {
            echo '<p>No hay tareas todavía.</p>';
        }
        ?>
    </div>

    <!-- Formulario para agregar tareas -->
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Escribe una tarea" required>
        <button type="submit">Agregar Tarea</button>
    </form>
</body>
</html>
