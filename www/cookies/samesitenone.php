<?php
header('Set-Cookie: unpartitioned=foobar; Secure; Path=/; SameSite=None; Max-Age=86400');
header('Origin-Trial: AxaaagJW8HOJtvFrCmbiobCcA64HfLOesA92jfHiSWe81+/MkKwpEBGKfU/Y/u8rG8Owzr2n6SlqEszDc6CRNggAAABveyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5LCJpc1RoaXJkUGFydHkiOnRydWV9');
header('Accept-CH: Sec-CH-Partitioned-Cookies');
?>
