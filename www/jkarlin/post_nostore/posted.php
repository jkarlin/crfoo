<?php
header("Cache-Control: no-store");
echo 'You posted: ' . htmlspecialchars($_POST["say"]) . '!';
?>

<p>The server time is:

<?php
echo time();
?>
