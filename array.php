<?php

// Primera forma de crear un array
$task = array(
    array(
        'id' => 1,
        'title' => 'Estudiar a las 2pm para un examen de matematicas',
        'completed' => true
    ),
    array(
        'id' => 2,
        'title' => 'Limpiar mi cuarto',
        'completed' => false
    ),
    array(
        'id' => 3,
        'title' => 'Comprar comida para la despensa',
        'completed' => false
    )
);

// Segunda forma de crear un array, usando [] en lugar de array() con el 
// mismo resultado
$products = [
    [
        'id' => 1,
        'name' => 'Coca Cola',
        'price' => 10.00
    ],
    [
        'id' => 2,
        'name' => 'Pepsi',
        'price' => 9.00
    ],
    [
        'id' => 3,
        'name' => 'Fanta',
        'price' => 8.00
    ]
];