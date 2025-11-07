<?php
    $nomes = ["Caio", "Marcos", "Diego"];

    foreach ($nomes as $nome) {
        echo $nome . "<br>";
    }

    $notasatividades = ["Caio" => 10, "Marcos" => 8, "Diego" => 9];

    foreach ($notasatividades as $nome => $nota) {
        echo $nome . " nota " . $nota . " <br> ";
    }

    $notasprovas = ["Caio" => 9, "Marcos" => 8, "Diego" => 7];

    foreach ($notasatividades as $nome => $nota) {
        $prova = $notasatividades[$nome];
        echo $nome . " nota " . $nota . " <br> ";
        echo $nome . " nota " . $prova . " <br> ";
    }

?>