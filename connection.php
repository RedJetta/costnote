<?php
$connect = @mysqli_connect('localhost', 'root', 'root', 'costnote') or die('Ощибка соединения с бд');
if(!$connect) die(mysqli_connect_error());

mysqli_set_charset($connect, "utf8") or die('Encoding false');
?>