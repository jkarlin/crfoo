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
<button onclick="myFunction2()">Popup</button>
<button onclick="myFunction3()">Reload</button>

<script>
function myFunction() {
  window.open("https://baidu.com", "_unfencedTop")
}
  
function myFunction2() {
  window.open("https://baidu.com")
}
  
function myFunction3() {
  location.reload()
}
</script>
  
</body>
