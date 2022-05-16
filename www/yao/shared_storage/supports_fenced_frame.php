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
  
<button onclick="myFunction()">Navigate top</button><br>
<button onclick="myFunction2()">Popup</button><br>
<button onclick="myFunction3()">Reload</button><br>
<button onclick="myFunction4()">Navigate self and then popup</button><br>
<br>
<button onclick="myFunction5()">Navigate self and then popup later</button><br>
<input type="text" id="popup-delay"><br>

  
<script>
function myFunction() {
  window.open("https://baidu.com", "_unfencedTop");
}
  
function myFunction2() {
  window.open("https://baidu.com");
}
  
function myFunction3() {
  location.reload();
}
  
function myFunction4() {
  window.location.href = 'supports_fenced_frame2.php';
  window.open("https://baidu.com");
}

function myFunction4() {
  window.location.href = 'supports_fenced_frame2.php';
  window.open("https://baidu.com");
}
  
function myFunction5() {
  window.location.href = 'supports_fenced_frame2.php';
  let delay = Number(document.getElementById("popup-delay").value);
  window.setTimeout(() => {
    window.open("https://baidu.com");
  }, delay);
}
  
  
</script>
  
</body>
