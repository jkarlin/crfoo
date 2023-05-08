<?php
header("Observe-Browsing-Topics: 1");
foreach (getallheaders() as $name => $value) {
    echo "$name: strlen($value)\n";
}
?>
<body>
  
</body>
