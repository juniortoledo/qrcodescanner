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

  <div class="container">
    <div class="row">
      <!-- logo -->
      <div class="col-md-12 text-center pt-5">
        <h4 class="display-5"><i class="fa fa-ticket text-primary"></i> Emissão de Cupom</h4>
      </div>

      <!-- botão scanner -->
      <div class="col-sm-12 col-md-4 offset-md-3 mt-5" id="root">
        <div id="qr-reader" class="w-100"></div>
      </div>
    </div>
  </div>


  <script src="scanner/scanner.js"></script>
  <script type="module" src="scanner/main.js"></script>
</body>

</html>