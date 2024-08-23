<?php
http_response_code(302);
?>
<!DOCTYPE html>
<html>
  <head>
    <script>
      fetch('/ajax.php')
        .then(res => res.text())
        .then(body => {
          window.location.replace("/client_redirect_b.html?"+body);
        });
    </script>
  </head>
</html>
