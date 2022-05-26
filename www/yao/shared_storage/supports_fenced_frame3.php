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

<script>
  
let arr = []
  
function myFunction() {
  arr.push(window.location.href);
  console.log(arr);
}

</script>
  
</body>
