<?php 

function formataData($data)
{
    $formatData = explode(" ", $data);
    $newData = $formatData[0];

    $newDataFormat = explode("-", $newData);

    return "$newDataFormat[2]/$newDataFormat[1]/$newDataFormat[0]";
}

function formataNome($data)
{
    $nomeCompleto = explode(" ", $data);
    $firstName = $nomeCompleto[0];

    return $firstName;
}

?>