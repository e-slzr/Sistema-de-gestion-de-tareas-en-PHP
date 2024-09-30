<?php
// Verifica si el formulario ha sido enviado
if (isset($_POST['task'])) {
    $task = $_POST['task'];

    // Ruta del archivo JSON donde almacenaremos las tareas
    $file = 'data/tasks.json';

    // Verifica si el archivo JSON ya existe
    if (file_exists($file)) {
        // Lee el archivo JSON y decodifica su contenido a un array
        $jsonData = file_get_contents($file);
        $tasks = json_decode($jsonData, true);
    } else {
        // Si el archivo no existe, crea un array vacío para almacenar las tareas
        $tasks = [];
    }

    // Agrega la nueva tarea al array de tareas
    $tasks[] = ['task' => $task, 'completed' => false];

    // Codifica el array de tareas nuevamente a JSON
    $jsonData = json_encode($tasks, JSON_PRETTY_PRINT);

    // Guarda el JSON en el archivo
    file_put_contents($file, $jsonData);

    // Redirige de vuelta al index.php para ver la lista de tareas actualizada
    header('Location: index.php');
    exit();
}
