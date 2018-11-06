<?php include 'includes/config.php';
ob_start();
include 'header.php';


if(isset($_REQUEST['submit'])){

    $userEmail = mysqli_real_escape_string($con,$_REQUEST['uemail']);
    $userPass =  crypt($_REQUEST['upass'], '$1$somethin$');
    $sql = "SELECT * FROM users WHERE email='$userEmail' && password='$userPass'";;
    $results = mysqli_query($con,$sql);

    if(mysqli_num_rows($results) > 0){
        $row = $results -> fetch_array();
        $_SESSION['u_id'] = $row['id'];
        $_SESSION['u_fname'] = $row['fname'];
        $_SESSION['u_lname'] = $row['lname'];
        $_SESSION['u_email'] = $row['email'];
        $_SESSION['u_type'] = $row['type'];
        header('location:index.php');
        exit();
    }else{
        header('location:login.php?n=1');
    }

}


?>


<style>
    #loginBtn{
        padding: 10px 20px;
        background-color: #4ebae3;
        border-color: transparent;
        color: white;
    }
    label{
        width:150px;
    }
</style>
<div class = "container" style="width: 90%;">

    <section style="width: 60%; margin: 0 auto;   margin-top: 5% !important;">
        <center><h2><?php echo $lang['login']; ?></h2><br>
        <form method="post" id="addForm"action="login.php">
           <?php if(isset($_GET['ref'])){ ?>
           <p style="color:red">Please login to checkout</p>
           <?php } ?>
            <label><?php echo $lang['email']; ?>:*</label>
            <input type="email" name="uemail" placeholder="<?php echo $lang['enter_email']; ?>"/><br><br>
            <label><?php echo $lang['password']; ?>:*</label>
            <input type="password" name="upass" placeholder="<?php echo $lang['enter_pass']; ?>"/><br>
            <label style="color:red;<?php if(isset($_GET['n'])){ echo 'display:block';}else{ echo 'display:none';}?>">
                <?php echo $lang['invalid_email']; ?> !!</label><br>
            <input type="submit" id="loginBtn" name="submit" value="<?php echo $lang['login']; ?>"/><br>
        </form>
        </center>
    </section>
</div>

<?php include 'footer.php'; ?>
