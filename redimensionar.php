<?php

$ruta_imagen    = 'imagenes/splash_fresas.jpg';
$escala         = 0.50;

$info_fuente    = getimagesize($ruta_imagen);
$recurso_fuente = imagecreatefromjpeg($ruta_imagen);

$ancho_nuevo    = round($info_fuente[0] * $escala);
$alto_nuevo     = round($info_fuente[1] * $escala);
$tipo_mime      = $info_fuente['mime'];

$recurso_copia  = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);

imagecopyresampled($recurso_copia, $recurso_fuente, 0, 0, 0, 0,
				   $ancho_nuevo, $alto_nuevo, 
				   $info_fuente[0], $info_fuente[1]);


header('Content-type: ' . $tipo_mime);
imagejpeg($recurso_copia, NULL, 100);
imagedestroy($recurso_copia);
imagedestroy($recurso_fuente);