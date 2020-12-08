<?php 
    include(APPROOT. '/Views/include/header.php');
    include(APPROOT. '/Views/include/navbar.php');
    $error = Message();
?>

<?php if($error != null): ?>
    <div>
    <h1><?php echo $error;?></h1>
    </div>
<?php endif ?>


<?php
    include(APPROOT . '/Views/include/footer.php');
?>