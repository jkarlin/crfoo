<?php
header("Supports-Loading-Mode: fenced-frame");
?>
<body>

Hi there, this document is served with a 'Supports-Loading-Mode: fenced-frame' header.

<p>The server time is: 

<?php
echo time();
?>
</p>
  
<button onclick="function() { window.top.location = 'https://google.com'}">Navigate top</button>
  
</body>
