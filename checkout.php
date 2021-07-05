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
  <link rel="stylesheet" href="main.css" />
</head>
<body class="w3-light-gray">
  <h1>aselfcheck</h1>
  <div class="w3-container ccdiv">
    Total: $ <?php echo(number_format($_SESSION["total"],2)); ?>
    <form action="/check.php" method="POST">
      Card no: <input type="tel" name="card" maxlength="19" class="card-input" /><br/><br/>
      <input type="submit" class="w3-button sbtn w3-center" value="Pay" />
    </form>
  </div>
</body>
</html>
