<?php include 'includes/config.php';
ob_start();
include 'header.php';
if(isset($_REQUEST['submit'])){
	@$_SESSION['cuemail'] = mysqli_real_escape_string($con,$_POST['uemail']);

	$userEmail = $_SESSION['cuemail'];
 	$uanswer = mysqli_real_escape_string($con,$_POST['uanswer']);
	$sql = "SELECT * FROM users WHERE email='$userEmail' && secretanswer='$uanswer'";;
    $results = mysqli_query($con,$sql);
	if(mysqli_num_rows($results) <= 0){
	?>
    <script>
	alert("You Entered wrong answer of secret question!")
	window.location.href = "forgetpassword.php";
	</script>
    <?php	
	}
	
}
if(isset($_REQUEST['changebtn'])){
	$useremail = mysqli_real_escape_string($con,$_POST['email']);
	$userPass = mysqli_real_escape_string($con, $_REQUEST['upass']);
    $userCpass = mysqli_real_escape_string($con, $_REQUEST['ucpass']);
	
   if($userPass!=$userCpass){
        $error = 'Passwords doesnt match';
    }else{
            $userfPass =  crypt($_REQUEST['upass'], '$1$somethin$');
        $query3 = "UPDATE `users` SET `password`='$userfPass' WHERE email = '$useremail'";

        if (mysqli_query($con, $query3)){
			unset($_SESSION['cuemail']);
            ?>
            <script>
                alert("Password Changed Successfully you can now login!")
                window.location.href="login.php"
            </script>
            <?php
        }else{
            echo mysqli_error($con);
        }
        
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
        <center><h2><?php echo $lang['changepassword']; ?></h2><br>
        <div id="error" style="color:red"><?php if(isset($error)){ echo $error; } ?></div>
        <form method="post" id="addForm"action="changepassword.php">
           
            <label><?php echo $lang['password']; ?>:*</label>
                <input type="password" name="upass" pattern=".{4,}" title="Four or more characters" required="required" placeholder="<?php echo $lang['enter_pass']; ?>"/>
                <input type="hidden" value="<?php echo $_SESSION['cuemail'] ?>" name="email">
                <br><br>
                <label><?php echo $lang['confirm_password']; ?>:*</label>
                <input type="password" name="ucpass" pattern=".{4,}" title="Four or more characters" required="required" placeholder="<?php echo $lang['rewrite_pass']; ?>"/><br><br>
                
            <input type="submit" id="loginBtn" name="changebtn" value="<?php echo $lang['changepassword']; ?>"/><br>
        </form>
        </center>
    </section>
</div>

<?php include 'footer.php'; ?>
