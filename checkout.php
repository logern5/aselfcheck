<?php
session_start();
//echo var_dump($_SESSION["items"]);
//echo var_dump($_SESSION["total"]);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" />
  <title>SelfCheck</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
</head>
<body>
  <h1>aselfcheck</h1>
  <div class="w3-container">
    Total: $ <?php echo(number_format($_SESSION["total"],2)); ?>
    <form action="/check.php" method="POST">
      Card no: <input type="tel" name="card" maxlength="19" /><br/>
      <input type="submit" value="Pay" />
    </form>
  </div>
</body>
</html>
