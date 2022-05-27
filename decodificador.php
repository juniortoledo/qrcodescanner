<?php

if (isset($_POST) && !empty($_POST)) {

  //var_dump($_POST);
  //die();

  $qrCode = trim(filter_input(INPUT_POST, 'qrCode'));

  if (!empty($qrCode)) {

    /*
  echo "<pre>";
  var_dump($_POST);
  die(); */

    /* VERIFICA SE O FORMATO DO QR CODE É VÁLIDO */

    $aux = explode("|", $qrCode);
    if (count($aux) < 4) {
      $msg = "Ops! QR Code não é válido.";
      echo "
    <script type=\"text/javascript\">
      alert(\"{$msg}\");
    </script>";
    }

    $msg = null;
    $cnpj = substr($aux[0], 6, 14);
    $nroNf = substr($aux[0], 22, 9);
    $dataEmissao = substr($aux[1], 0, 8);
    $valorNf = $aux[2];
    $cpf = $aux[3];

    if (!is_numeric($cnpj) || !is_numeric($dataEmissao) || !is_numeric($valorNf) || !is_numeric($cpf)) {
      $msg = "Ops! QR Code não é válido.";
    } else {
      $ano = substr($dataEmissao, 0, 4);
      $mes = substr($dataEmissao, 4, 2);
      $dia = substr($dataEmissao, 6, 2);
      if (!checkdate($mes, $dia, $ano)) {
        $msg = "Ops! QR Code não é válido.";
      }
    }

    if (!empty($msg)) {
      echo "
    <script type=\"text/javascript\">
      alert(\"{$msg}\");
    </script>";
    }

    /* VERIFICA SE DATA DE EMISSÃO DA NF ESTÁ NO PERIODO DA CAMPANHA */

    /* VERIFICA SE LOJA ESTÁ PARTICIPANDO */


    /* SALVA OS DADOS EM TABELA TEMPORÁRIA */

    echo "<pre>";
    var_dump($cpf, $cnpj, $valorNf, $dataEmissao, $nroNf);
    die();
  }
}

function fim() {

}


if(2 >1) {
  return true;
  fim();
}

2 > 1 ? true : false;