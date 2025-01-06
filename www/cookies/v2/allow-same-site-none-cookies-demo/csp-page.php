<!DOCTYPE html>
<meta charset="utf-8">
<br>
The photo will render when the "same-site-none" cookie is available and will not load if the cookie is blocked.

<?php if(isset($_COOKIE[$"same-site-none"])) : ?>
    <img src="./png.php">
<?php else : ?>
    <text> The cookie is NOT present in this context </text>
<?php endif; ?>

<br>
This can also be confirmed using the Network tab in DevTools by inspecting the request headers for the Cookie header.