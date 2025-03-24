<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    button {
        padding: 10px 20px;
        margin: 10px;
        min-width: 100px;
      }
  </style>
</head>

<body>
  <button onclick="goBack()">Back</button>
  <button onclick="goForward()">Forward</button>
  <button onclick="pushState2()">PushState2</button>
  <button onclick="pushState3()">PushState3</button>
  <button onclick="replaceState2()">ReplaceState2</button>
  <button onclick="replaceState3()">ReplaceState3</button>
  <button onclick="historyLength()">Length</button>

  <span>History Length:&nbsp;</span><span id="history-length"></span>

  <script>
    function goBack() {
      window.history.back();
    }

    function goForward() {
      window.history.forward();
    }

    function pushState2() {
      window.history.pushState('', '', 'state2.html');
    }

    function pushState3() {
      window.history.pushState('', '', 'state3.html');
    }

    function replaceState2() {
      window.history.replaceState('', '', 'state2.html');
    }

    function replaceState3() {
      window.history.replaceState('', '', 'state3.html');
    }

    function historyLength() {
      let length = history.length;
      document.getElementById("history-length").textContent = length;
    }
  </script>

</body>
</html>
