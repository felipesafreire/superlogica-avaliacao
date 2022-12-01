<?php

/* ------------------------- */

$array = [];

for ($i = 0; $i < 7; $i++) {
    array_push($array, rand(0, 100));
}

echo "Array com 7 posições: ";
print_r($array);
echo "<br /><br />";

/* ------------------------- */

/* ------------------------- */

echo "Posição 3 do array: {$array[2]} <br /><br />";

/* ------------------------- */

$arrayEmString = implode(',', $array);
echo "Array em string separado por virgula: {$arrayEmString} <br /><br />";

/* ------------------------- */

$arrayNovo = explode(',', $arrayEmString);
unset($array);
echo "Novo array a partir da string: ";
print_r($arrayNovo);
echo "<br /><br />";

/* ------------------------- */

$numeroQuatorzeEncontrado = array_search(14, $arrayNovo);
if ($numeroQuatorzeEncontrado !== false) {
    $numeroQuatorzeEncontrado += 1;
    echo "Número 14 encontrado na posição {$numeroQuatorzeEncontrado} do array <br /><br />";
} else {
    echo "Número 14 não encontrado no array <br /><br />";
}

/* ------------------------- */

function removePosicaoAtualDaMenorAnterior($array, $arr)
{
    $valorEncontrado = array_search($arr, $array);
    if (!empty($array[$valorEncontrado - 1])) {
        if ($arr < $array[$valorEncontrado - 1]) {
            unset($array[$valorEncontrado]);
        }
    }
    return $array;
}

$arrayNovo = array_reduce($arrayNovo, 'removePosicaoAtualDaMenorAnterior', $arrayNovo);

echo "Removido posição atual se for menor que a posição anterior: ";
print_r($arrayNovo);
echo "<br /><br />";

/* ------------------------- */

unset($arrayNovo[array_key_last($arrayNovo)]);
echo "Removido última posição do array: ";
print_r($arrayNovo);
echo "<br /><br />";

/* ------------------------- */

$count = count($arrayNovo);
echo "Quantidade de posições no array: {$count} <br /><br />";

/* ------------------------- */

$arrayNovo = array_reverse($arrayNovo);
echo "Array invertido: ";
print_r($arrayNovo);
echo "<br /><br />";



