<?php include 'includes/config.php';
include 'header.php';


if(!isset($_SESSION['u_id'])){
    header('location:login.php');
}

?>

<div class = "container" style="display: inline-block; width: 100%;">

    <section style="margin-top: 5%">
        <h1><?php echo $lang['thank_you']; ?>!</h1><br>
        <p><?php echo $lang['order_success']; ?></p><br><br>
    </section>
</div>


<?php include 'footer.php'; ?>
