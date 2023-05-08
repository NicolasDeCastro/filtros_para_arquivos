<?php 
require 'Meufiltro.php';

$arquivo=fopen('teste.txt','r');
stream_filter_register('testando_filtro',Meufiltro::class);

stream_filter_append($arquivo,'testando_filtro');

echo fread($arquivo,filesize('teste.txt'));