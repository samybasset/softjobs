<?php
  require_once 'init.php';
  $current_page = 'index.php';
  $vacature = new Vacature();
  $user = new User();
  $user_logged_in = $user->is_user_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vacature overzicht | Softjobs</title>
  <!-- CK editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Start  header -->
  <?php
    if($user_logged_in) {
      include 'assets/includes/header_logged_in.php';
    } else if($user_logged_in == false) {
      include 'assets/includes/header.php';
    }
  ?>
  <!-- End  header -->

  <!-- Begin sidebar -->
  <?php //include 'assets/includes/sidebar.php'; ?>
  <!-- End sidebar -->

  <button type="button" name="button" class='open' style="display: none;"><i class="fa fa-sliders"></i></button>
  <div class='container'>
    <div class='wrapper'>
      <!-- <div class=" titel">
        <div class="col-md-12">
            <h2 class='text-right'>Vacatures</h2>
        </div>
      </div>
      <div class="">
        <div class="sort col-md-2 pull-right">
          <form class="sorteer overzicht" method="post">
            <label for="">Sorteer op:</label>
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <button type="submit" name="button" class='btn btn-default'>Sorteer</button>
          </form>
        </div>
      </div> -->
      <?php
        if($user->is_user_logged_in()) {
          include 'assets/includes/solliciteren.php';
        } elseif($user->is_user_logged_in() === false) {
          include 'assets/includes/login.php';
        }



       ?>
    </div>
  </div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
<script type="text/javascript">
CKEDITOR.replace( 'sollicitatie_form',
{
height: '400px'
} );
</script>
</html>
