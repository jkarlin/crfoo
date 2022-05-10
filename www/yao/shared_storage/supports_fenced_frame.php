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
  
<button onclick="myFunction()">Navigate top</button>

<script>
function myFunction() {
  window.top.location = 'https://google.com';
}
</script>
  
</body>
