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
    <p>For more info, see <a href="https://github.com/jkarlin/crfoo/tree/main/www/fenced_frame/README.md">README.md</a></p>
    <div>
      <label for="frame-url">Frame URL:</label>
      <select name="frame-url" id="frame-url">
        <option>hello_world.php</option>
      </select>
    </div>

    <div>
      <button onclick="createFencedFrame()">Add Fenced Frame</button>
    </div>
    <div>
      <button onclick="createIframe()">Add IFrame</button>
    </div>
    <div>
     <button onclick="createCredentiallessIframe()">Add Credentialless IFrame</button>
    </div>

    <div id="frame-container"></div>
  </body>
</html>
