<?php
// Verifica si el formulario ha sido enviado
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $file = 'data/tasks.json';

    // Lee el archivo JSON y decodifica su contenido a un array
    $jsonData = file_get_contents($file);
    $tasks = json_decode($jsonData, true);

    // Marca la tarea como completada
    if (isset($tasks[$index])) {
        $tasks[$index]['completed'] = true;
    }

    // Codifica el array de tareas nuevamente a JSON
    $jsonData = json_encode($tasks, JSON_PRETTY_PRINT);
    file_put_contents($file, $jsonData);

    // Redirige de vuelta al index.php
    header('Location: index.php');
    exit();
}
?>
