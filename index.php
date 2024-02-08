<?php
require_once 'array.php';

// Habilitamos CORS (Cross-Origin Resource Sharing) para permitir solicitudes desde cualquier origen.
header("Access-Control-Allow-Origin: *");
// Configuramos el encabezado para indicar que la respuesta es JSON.
header('Content-Type: application/json; charset=utf-8');


$method = $_SERVER['REQUEST_METHOD']; // Obtenemos el método u verbo de la petición.

// === Solicitudes GET ===
// -----------------------
if ($method === 'GET') {
    // Hacemos un hola mundo para probar que todo está funcionando.
    /* if (isset($_GET['name'])):
        $name = $_GET['name'];

        $response = array('message' => "Hola, $name");
        echo json_encode($response);
        exit();
    else:
        echo json_encode('Hola mundo!!');
    endif; */


    // Obtenemos la tarea a buscar por id, sino no esta devolvemos todas las tareas extraidas
    // desde la database array.php que se encuentra en la raiz del proyecto.
    /* if (!empty($_GET['id'])) {
        $id = intval($_GET['id']);
        global $task;

        foreach ($task as $t) {
            if ($t['id'] === $id) {
                echo json_encode($t);
                return;
            }
        }
        echo json_encode(['message' => 'Tarea no encontrada']);
    } else {
        echo json_encode($task);
    } */


    // Obtenemos la informacion de todos los usuarios que se encuentra en la database 
    // users.json que se encuentra en la raiz del proyecto.
    $body = json_decode(file_get_contents('users.json'), true);
    
    if (isset($_GET['id'])) {
        $key = array_column($body['users'], 'id'); // Obtenemos el id de todos los usuarios.
        $name = array_search(intval($_GET['id']), $key); // Buscamos el id en el array de las keys.

        if ($name === false) { // tiene que ser igualado a false
            echo json_encode(['message' => 'Usuario no encontrado']);
            return;
        }

        echo json_encode($body['users'][$name]['name']);
        return;
    }

    echo json_encode($body['users']);
    exit();
}


// === Solicitudes POST ===
// ------------------------
if ($method === 'POST') {
    $body = json_decode(file_get_contents('php://input'), true); // Se obtiene el cuerpo de la solicitud.

    if (empty($body['name']) || empty($body['price'])) {
        http_response_code(400); // Si no se recibieron los datos

        $res = array('message' => 'Faltan datos');
        echo json_encode($res);
        return;
    }

    // Primera forma de agregar información al arreglo de productos.
    /* array_push($products, array(
        "id" => count($products) + 1,
        "name" => $body['name'],
        "price" => $body['price']
    )); */

    // Segunda forma de agregar información al arreglo de productos.
    $product = [
        "id" => count($products) + 1,
        "name" => $body['name'],
        "price" => $body['price']
    ];
    array_push($products, $product);

    echo json_encode($products); 
    exit();
}