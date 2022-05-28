$('#btn').click(e => {
  $('#root').html(`<div id="qr-reader" class="w-100"></div>`)

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
  
            // envia mensagem decodificada via post para php
            window.location.href = `${window.location}decodificador.php?qrCode=${decodedText}`
        }
    }
  
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
  });
})

