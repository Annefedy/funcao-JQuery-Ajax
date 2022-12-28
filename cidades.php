<?php
    $connect = new PDO("mysql:host=localhost;dbname=brasil", "root", "");
    $connect->exec('SET CHARACTER SET utf8');

    $pegaCidades = $connect->prepare("SELECT * FROM cidades WHERE estados_id='".$_POST['id']."'");
    $pegaCidades->execute();

    $fetchAll = $pegaCidades->fetchAll();

    foreach($fetchAll as $cidades)
    {
        echo '<option>' .$cidades['nome'].'</option>';
    }
?>