<?php
    require_once '../init.php';
    $company = new Company();
    $message = new Message();
    $vacature = new Vacature();
    $medewerker = new Medewerker();
    $branche = new Branche();
    $logged_in = $company->is_company_logged_in();
    if(!$logged_in) { // check if company is logged in
      echo '<script>location.href="../company.php"</script>'; // relocate user to login page
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Softjobs - Admin paneel</title>


    <!-- CK editor -->
    <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom css  -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- BEGIN NAVAR -->
        <?php include 'includes/navbar.php'; ?>
        <!-- END NAVBAR -->

        <!-- Begin sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- End sidebar -->
        <div id="page-wrapper">

            <div class="container-fluid">
              <div class="well">
                <p>
                  Wijzig bedrijfsgegevens
                </p>
              </div>
              <?php
                $get_company_id = $company->get_company_id($_SESSION['company_username']);
                $get_company_id = $get_company_id['bedrijfID'];
                $get_company_info = $company->get_company_by_id($get_company_id);
               ?>
              <div class="add_vacature">
                <form method="post">
                  <div class="form-group">
                    <label for="">Wijzig bedrijfsnaam</label>
                    <input type="text" name="bedrijfnaam" value="<?php echo $get_company_info['bedrijfsnaam'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Wijzig adres</label>
                    <input type="text" name="adres" value="<?php echo $get_company_info['adres'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Wijzig postcode</label>
                    <input type="text" class="form-control" name="postcode" value="<?php echo $get_company_info['postcode'] ?>" placeholder="Vul het minimale uren in">
                    <label for="">Wijzig woonplaats</label>
                    <input type="text" class="form-control" name="woonplaats" value="<?php echo $get_company_info['plaats'] ?>" placeholder="Vul het maximale uren in">
                  </div>
                  <div class="form-group">
                    <label for="">Wijzig gebruikersnaam</label>
                    <input type="text"class="form-control" name="gebruikersnaam" value="<?php echo $get_company_info['username'] ?>" placeholder="Vul het minimale salaris in">
                    <label for="">Wijzig email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $get_company_info['email'] ?>" placeholder="Vul het maximale salaris in">
                  </div>
                  <button type="submit" name="edit" class="custombutton">Wijzig bedrijf informatie</button>
                </form>
              </div>
            <!-- /vacature_overzicht -->
          </div>
            <!-- /.container-fluid -->
              <?php
              if(isset($_POST["edit"])) {
                $company->edit_company_profile($_POST['bedrijfnaam'], $_POST['adres'], $_POST['postcode'], $_POST['woonplaats'], $_POST['email'], $_POST['gebruikersnaam'], $get_company_id);
                echo '<script>location.href="edit_profile.php"</script>';
               }

              ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
<script type="text/javascript">
CKEDITOR.replace( 'new_vacature',
{
height: '400px'
} );
</script>
</html>
