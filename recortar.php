<?php

$ruta_imagen    = 'imagenes/splash_fresas.jpg';
$ancho_recorte  = 200;
$alto_recorte   = 150;

$info_fuente    = getimagesize($ruta_imagen);
$tipo_mime      = $info_fuente['mime'];

$recurso_fuente = imagecreatefromjpeg($ruta_imagen);

$centro_x       = round($info_fuente[0] / 2);
$centro_y       = round($info_fuente[1] / 2);
$x_recorte      = $centro_x - ($ancho_recorte / 2);
$y_recorte      = $centro_y - ($alto_recorte / 2);


$recurso_copia  = imagecreatetruecolor($ancho_recorte, $alto_recorte);

imagecopyresampled($recurso_copia, $recurso_fuente, 0, 0, $x_recorte, $y_recorte,
				   $ancho_recorte, $alto_recorte, 
				   $ancho_recorte, $alto_recorte);


header('Content-type: ' . $tipo_mime);
imagejpeg($recurso_copia, NULL, 100);
imagedestroy($recurso_copia);
imagedestroy($recurso_fuente);