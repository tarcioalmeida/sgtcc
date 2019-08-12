<?php
$conexao=mysqli_connect("localhost", "root","","sgtcc");

$query = "SELECT * FROM `curso`";
$result = mysqli_query($conexao, $query);
?>
