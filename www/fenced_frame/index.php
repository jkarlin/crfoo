<?php
header("Supports-Loading-Mode: fenced-frame");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fenced Frames Demo</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src=index.js></script>
  </head>
  <body>
    <h1>Fenced Frames Demo</h1>
    <p>This demo site is for testing functionality of fenced frames. Use the buttons below to create and manipulate frames.</p>
  </body>
  <label for="frameUrl">Frame URL:</label>
  <select name="frameUrl" id="frameUrl">
    <option value="hello_world">hello_world.php</option>
  </select>

  <button onclick="createFencedFrame()">Add Fenced Frame</button>
  <button onclick="createIframe()">Add IFrame</button>
  <button onclick="createCredentiallessIframe())">Add Credentialless IFrame</button>
</html>
