<?php
header("Observe-Browsing-Topics: 1");
foreach (getallheaders() as $name => $value) {
    echo "$name:";
    echo strlen($value);
}
?>
<body>
  
</body>
