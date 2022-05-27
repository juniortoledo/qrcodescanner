function docReady(fn) {
  if (document.readyState === "complete"
      || document.readyState === "interactive") {
      setTimeout(fn, 1);
  } else {
      document.addEventListener("DOMContentLoaded", fn);
  }
}

docReady(function () {
  let resultContainer = document.getElementById('qr-reader-results');
  let lastResult, countResults = 0;
  function onScanSuccess(decodedText, decodedResult) {
      if (decodedText !== lastResult) {
          ++countResults;
          lastResult = decodedText;

          // mensagem decodificada
          alert(decodedText)

          // envia mensagem decodificada via post para php
          fetch('/decodificador.php', {
            method: 'POST',
            body: {
              qrCode: decodedText
            }
          })
            .then()
      }
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
      "qr-reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess);
});