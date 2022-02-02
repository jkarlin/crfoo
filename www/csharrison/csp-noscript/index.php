<?php
header("Content-Security-Policy: script-src none; object-src none");
?>

<body>
<script>
console.log("HELLO WORLD");
</script>
<noscript>
Noscript executed
</noscript>
</body>

