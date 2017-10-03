<!DOCTYPE html>
<html>
<head>
  <style>
    <?php
      if(isset($_POST['CSSContext'])){
          echo $_POST['CSSContext'];
      }

    ?>
  </style>
</head>
<body>
  <?php
      if(isset($_POST['HTMLContext'])){
        echo $_POST['HTMLContext'];
      }

   ?>

<script>
  <?php
      if(isset($_POST['JAVASCRIPTContext'])){
        echo $_POST['JAVASCRIPTContext'];
      }

   ?>
</script>
</body>

</html>
