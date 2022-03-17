<?php
header('Set-Cookie: unpartitioned=foobar; Secure; Path=/; SameSite=None; Max-Age=0');
header('Set-Cookie: __Host-1P_partitioned=foobar; Secure; Path=/; SameSite=None; Partitioned; Max-Age=0');
?>
