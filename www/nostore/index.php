<?php
header("Cache-Control: no-store");
?>
<body>

Hi there, this document is served with a 'cache-control: no-store' header.


<p>The server time is: 

<?php
echo time();
?>
</p>
</body>
