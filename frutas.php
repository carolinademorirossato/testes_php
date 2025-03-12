<?php
$fruta = "maçã";
$cor = "vermelha";

echo "Fruta: $fruta, Cor: $cor ";

if($fruta == "maçã") {
  if ($cor == "vermelha") {
     echo "A fruta é uma maçã vermelha.";
  } elseif ($cor == "verde") {
     echo "A fruta é uma maçã verde.";
  } else {
     echo "A maçã tem uma cor diferente.";
  }
} elseif ($fruta == "banana") {
   echo "A fruta é uma banana.";
} elseif ($fruta == "laranja") {
   echo "A fruta é uma laranja.";
} else {
   echo "Não reconhecemos essa fruta.";
}
?>