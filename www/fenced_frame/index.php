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

  <button onclick="createFencedFrame('https://cr.kungfoo.net/fenced_frame/content/hello_world.php')">Add Fenced Frame</button>
  <button onclick="createIframe('https://cr.kungfoo.net/fenced_frame/content/hello_world.php')">Add IFrame</button>
  <button onclick="createCredentiallessIframe('https://cr.kungfoo.net/fenced_frame/content/hello_world.php')">Add Credentialless IFrame</button>
</html>
