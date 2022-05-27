<?php

  $qrCodeExemplo = "35220543283811004147590000201239492551227910|20220527144552|15.50|06232226801|cWboiAwUTvz8dOAh1SK/IucPE9e++D7RUH7N2HyiorGnd5c9H+rSYkmfKrQgu54zOekwsN2Gl/XHynbX0F3UKi+LAvOAKriPbig64nG8JuzOcHQDVD0lv8stWV0PeVaTuddIBwaJtSYn3U6rQ55qc6nv1uufHhGS/+7R7drzmPrU1VjDWYKpGLG8JyFTv9/qlo5OF/RyXJhJ2ROef1vM9W6TQwzoEjGFF7D9MK1+bTWC3HQAyQBLoOtBgQ387lwIdSDj+/v0GO1K9VSW/IIZQW8d3M25A+e9Lg6gFUnEpSChFOeR1Cq05giOFhMW92s48mRlE/LiLDP7i1WcZbtXwQ==";

  if( isset( $_POST ) && !empty( $_POST ) ){ 

    //var_dump($_POST);
    //die();

    $qrCode = trim(filter_input( INPUT_POST, 'qrCode', FILTER_SANITIZE_STRING ));

    if( !empty($qrCode) ){

      /*
      echo "<pre>";
      var_dump($_POST);
      die(); */

      /* VERIFICA SE O FORMATO DO QR CODE É VÁLIDO */

      $aux = explode("|", $qrCode);
      if( count($aux) < 4 ){
        $msg = "Ops! QR Code não é válido.";
        echo "
        <script type=\"text/javascript\">
          alert(\"{$msg}\");
        </script>";
        goto fim;
      }

      $msg = null;
      $cnpj = substr($aux[0],6,14);
      $nroNf = substr($aux[0],22,9);
      $dataEmissao = substr($aux[1],0,8);
      $valorNf = $aux[2];
      $cpf = $aux[3];        

      if( !is_numeric($cnpj) || !is_numeric($dataEmissao) || !is_numeric($valorNf) || !is_numeric($cpf) ){
        $msg = "Ops! QR Code não é válido.";
      }else{
        $ano = substr($dataEmissao,0,4);
        $mes = substr($dataEmissao,4,2);
        $dia = substr($dataEmissao,6,2);
        if( !checkdate($mes, $dia, $ano) ){
          $msg = "Ops! QR Code não é válido.";
        }
      }

      if( !empty($msg) ){
        echo "
        <script type=\"text/javascript\">
          alert(\"{$msg}\");
        </script>";
        goto fim;          
      }

      /* VERIFICA SE DATA DE EMISSÃO DA NF ESTÁ NO PERIODO DA CAMPANHA */

      /* VERIFICA SE LOJA ESTÁ PARTICIPANDO */


      /* SALVA OS DADOS EM TABELA TEMPORÁRIA */

      echo "<pre>";    
      var_dump($cpf, $cnpj, $valorNf, $dataEmissao, $nroNf);
      die();

    }

  }

  fim:

?>

      
<!DOCTYPE HTLML>
<html lang="pt-br">
  <head>
    <title>CUPONET.COM.BR</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="bootstrap441/css/bootstrap.css"> 
    <script src="bootstrap441/js/bootstrap.js"></script> 
  </head>
  
  <body>

    <div class="col-md-12 text-center pt-5">
      <h4 class="display-5"><i class="fa fa-ticket text-primary"></i> Emissão de Cupom</h4>
    </div>

    <div class="container">

      <div class="row d-flex justify-content-center">

        <form class="form" method="post" autocomplete="off">

          <div class="row mb-2">
            <label for="qrCode" class="control-label">QR Code:</label>
            <input type="text" class="form-control" name="qrCode" value="<?=$qrCodeExemplo;?>">
          </div>

          <div class="row">
            <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
          </div>

        </form>

      </div>
    </div>

  </body>
</html>