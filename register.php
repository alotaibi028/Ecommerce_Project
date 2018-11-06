<?php include 'includes/config.php';
include 'header.php';


if(isset($_REQUEST['submit'])){
    $userFname = mysqli_real_escape_string($con, $_REQUEST['ufname']);
    $userLname = mysqli_real_escape_string($con, $_REQUEST['ulname']);
    $userEmail = mysqli_real_escape_string($con, $_REQUEST['uemail']);
    $userPass = mysqli_real_escape_string($con, $_REQUEST['upass']);
    $userCpass = mysqli_real_escape_string($con, $_REQUEST['ucpass']);
    if(isset($_REQUEST['utype'])){
        $userType = 'vendor';
    }else{
        $userType = 'customer';
    }
    

    $sql = "SELECT * FROM users WHERE email = '".$userEmail."';";
    $results = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($results) > 0){
        $error = 'Email already exists';
    }elseif($userPass!=$userCpass){
        $error = 'Passwords doesnt match';
    }else{
            $userfPass =  crypt($_REQUEST['upass'], '$1$somethin$');
        $query3 = "insert into users (id,fname,lname,email,password,type) values (0,'" . $userFname . "','" . $userLname . "','" . $userEmail . "','" . $userfPass . "','" . $userType . "')";

        if (mysqli_query($con, $query3)){
            $last_id = $con->insert_id;
            $sql = "SELECT * FROM users WHERE id = '".$last_id."';";
            $results = mysqli_query($con,$sql);
            $row = $results -> fetch_array();
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_fname'] = $row['fname'];
            $_SESSION['u_lname'] = $row['lname'];
            $_SESSION['u_email'] = $row['email'];
            $_SESSION['u_type'] = $row['type'];
            ?>
            <script>
                alert("Registration Successful")
                window.location.href="index.php"
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
        <center><h2><?php echo $lang['sign_up']; ?></h2><br>
           <div id="error" style="color:red"><?php if(isset($error)){ echo $error; } ?></div>
            <form method="post" id="addForm" action="">
                <label><?php echo $lang['first_name']; ?>:*</label>
                <input type="text" pattern="[أ-يa-zA-Z ]{1,}" required="required" name="ufname" placeholder="<?php echo $lang['enter_fname']; ?>" title="Only Alphabets or arabic"/><br><br>
                <label><?php echo $lang['last_name']; ?>:*</label>
                <input type="text" name="ulname" pattern="[أ-يa-zA-Z ]{1,}" title="Only Alphabets or arabic" required="required" placeholder="<?php echo $lang['enter_lname']; ?>"/><br><br>
                <label><?php echo $lang['email']; ?>:*</label>
                <input type="email" name="uemail"  required="required" placeholder="<?php echo $lang['enter_email']; ?>"/><br><br>
                <label><?php echo $lang['password']; ?>:*</label>
                <input type="password" name="upass" pattern=".{4,}" title="Four or more characters" required="required" placeholder="<?php echo $lang['enter_pass']; ?>"/><br><br>
                <label><?php echo $lang['confirm_password']; ?>:*</label>
                <input type="password" name="ucpass" pattern=".{4,}" title="Four or more characters" required="required" placeholder="<?php echo $lang['rewrite_pass']; ?>"/><br><br>
                <input type="checkbox" style="margin-left: 80px" name="utype" value=""><?php echo $lang['check']; ?><br>
                <label style="color:red;<?php if(isset($_GET['n'])){ echo 'display:block';}else{ echo 'display:none';}?>">
                    Successfully Registered !!</label><br>
                <input type="submit" id="loginBtn" name="submit" value="<?php echo $lang['sign_up']; ?>"/><br><br>
            </form>
        </center>
    </section>
</div>



<?php include 'footer.php'; ?>

