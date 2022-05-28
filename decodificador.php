<?php

// recebe código qrcode via GET
$qrCode = $_GET['qrCode'];

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

// redireciona para home, para inserir novamente outro qr code
header('location: localhost/qrcodescanner');

