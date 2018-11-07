<?php include 'includes/config.php';
include 'header.php';


if(isset($_REQUEST['submit'])){

    $userFname = $_REQUEST['ufname'];
    $userLname = $_REQUEST['ulname'];
    $userEmail = $_REQUEST['uemail'];
    $userPass = $_REQUEST['upass'];
    $userCpass = $_REQUEST['ucpass'];
    $userType = $_REQUEST['utype'];

    $sql = "SELECT * FROM users WHERE email = '".$userEmail."' And password = '".$userPass."';";
    $results = mysqli_query($con,$sql);

    if(mysqli_num_rows($results) > 0){
        $row = $results -> fetch_array();
        $_SESSION['u_id'] = $row['id'];
        $_SESSION['u_fname'] = $row['fname'];
        $_SESSION['u_lname'] = $row['lname'];
        $_SESSION['u_email'] = $row['email'];
        $_SESSION['u_type'] = $row['type'];
        header('location:index.php');
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
</style>
<div class = "container" style="width: 90%;">

    <section style="width: 60%; margin: 0 auto;   margin-top: 5% !important;">
        <center><h2><?php echo $lang['sign_up']; ?></h2><br>
            <form method="post" id="addForm" action="login.php">
                <label><?php echo $lang['first_name']; ?>:*</label>
                <input type="text" name="ufname" placeholder="<?php echo $lang['enter_fname']; ?>"/><br><br>
                <label><?php echo $lang['last_name']; ?>:*</label>
                <input type="text" name="ulname" placeholder="<?php echo $lang['enter_lname']; ?>"/><br><br>
                <label><?php echo $lang['email']; ?>:*</label>
                <input type="email" name="uemail" placeholder="<?php echo $lang['enter_email']; ?>"/><br><br>
                <label><?php echo $lang['password']; ?>:*</label>
                <input type="password" name="upass" placeholder="<?php echo $lang['enter_pass']; ?>"/><br><br>
                <label><?php echo $lang['confirm_password']; ?>:*</label>
                <input type="password" name="ucpass" placeholder="<?php echo $lang['rewrite_pass']; ?>"/><br><br>
                <input type="checkbox" style="margin-left: 80px" value=""><?php echo $lang['check']; ?><br>
                <label style="color:red;<?php if(isset($_GET['n'])){ echo 'display:block';}else{ echo 'display:none';}?>">
                    Successfully Registered !!</label><br>
                <input type="submit" id="loginBtn" name="submit" value="<?php echo $lang['sign_up']; ?>"/><br><br>
            </form>
        </center>
    </section>
</div>



<?php include 'footer.php'; ?>

