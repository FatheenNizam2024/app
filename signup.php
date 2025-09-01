<?php 

    include 'libs/load.php';

    // print_r("_POST");
    // print_r($_POST); 

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php 
        load_template('_head');  
    ?>
    
</head>

<body>     

    <?php 
       load_template('_theme');
       ?>

    <header data-bs-theme="dark">
       <?php 
       load_template('_header');
       ?>
    </header>

    <main>
        <?php 
          load_template('_signup');
        //   print_r("_POST");
        //   print_r($_POST);
        ?>
        <!-- <?php 
          //echo $username
         ?> -->

    </main>

    <footer class="text-body-secondary py-5">
        <?php 
         load_template('_footer');
        ?>
    </footer>
    <script src="./assets/dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm"></script>
</body>

</html>