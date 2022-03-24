<?php
header('Origin-Trial: AxaaagJW8HOJtvFrCmbiobCcA64HfLOesA92jfHiSWe81+/MkKwpEBGKfU/Y/u8rG8Owzr2n6SlqEszDc6CRNggAAABveyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5LCJpc1RoaXJkUGFydHkiOnRydWV9');
header('Accet-CH: Sec-CH-Partitioned-Cookies');
?>
<!DOCTYPE html>
<meta charset="utf-8">
<button id="set-cookie">Set cookie (SameSite=None)</button>
<button id="set-partitioned-cookie">Set partitioned cookie (SameSite=None; Partitioned)</button>
<div>document.cookie is <span id="document-cookie"></span></div>
<button id="clear-cookies">Clear cookies</button>
<script src="./main.js"></script>
