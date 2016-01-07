<?php

$mysqli = new mysqli("localhost", "root", "qwerty", "rhconect_wprh");
$sql = "SELECT post_title FROM f8c_posts WHERE post_type = 'empresas'";
$mysqli->set_charset('utf8');
$resultado = $mysqli->query($sql);

$return = [];
while($fila = $resultado->fetch_assoc())
{
    $return[] = htmlspecialchars_decode($fila['post_title']);
}

echo json_encode($return);