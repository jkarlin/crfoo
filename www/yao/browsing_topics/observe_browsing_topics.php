<?php
header("Observe-Browsing-Topics: 1");
header('Location: observe_browsing_topics2.php');
?>
<body>

<pre><?php var_dump($_SERVER); ?></pre>

<button onclick="function1()">Navigate self</button><br>
<button onclick="function2()">Invoke document.browsingTopics()</button><br>

<script>
function function1() {
  window.location.href = 'observe_browsing_topics.php';
}
  
function function2() {
  document.browsingTopics();
}
</script>
  
</body>
