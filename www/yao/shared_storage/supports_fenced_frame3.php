<?php
header("Supports-Loading-Mode: fenced-frame");
?>
<body>
<p>The server time is: 

<?php
echo time();
?>
</p>
  
<button onclick="myFunction()">Get top url</button><br>

<script>
  
let arr = []
  
function myFunction() {
  arr.push(window.location.href);
  console.log(arr);
}

</script>
  
</body>
