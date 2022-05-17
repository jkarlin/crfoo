<?php
header("Supports-Loading-Mode: fenced-frame");
?>
<body>
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
<button onclick="myFunction5()">Same-site navigation, and then popup</button><br>
<button onclick="myFunction6()">Cross-site navigation, and then popup</button><br>
<input type="text" id="popup-delay" value="50"><br>
<fencedframe id="frame1" mode="opaque-ads" style="width: 100%" src="supports_fenced_frame.php"></fencedframe>

<iframe id="iframe1" src="iframe.html"><iframe>
  
<script>
function myFunction() {
  window.open("https://google.com", "_unfencedTop");
}
  
function myFunction2() {
  window.open("https://google.com");
}
  
function myFunction3() {
  location.reload();
}
  
function myFunction4() {
  window.location.href = 'supports_fenced_frame2.php';
  window.open("https://google.com.com");
}

function myFunction4() {
  window.location.href = 'supports_fenced_frame2.php';
  window.open("https://google.com");
}
  
function myFunction5() {
  window.location.href = 'supports_fenced_frame2.php';
  let delay = Number(document.getElementById("popup-delay").value);
  window.setTimeout(() => {
    window.open("https://google.com");
  }, delay);
}

function myFunction6() {
  window.location.href = 'https://baidu.com';
  let delay = Number(document.getElementById("popup-delay").value);
  window.setTimeout(() => {
    window.open("https://google.com");
  }, delay);
}
  
</script>
  
</body>
