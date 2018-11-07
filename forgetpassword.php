<?php include 'includes/config.php';
ob_start();
include 'header.php';
			unset($_SESSION['cuemail']);



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
        <center><h2><?php echo $lang['fp']; ?></h2><br>
        <form method="post" id="addForm" action="changepassword.php">
          
            <label><?php echo $lang['email']; ?>:*</label>
            <input type="email" name="uemail" required placeholder="<?php echo $lang['enter_email']; ?>"/><br><br>
            <label><?php echo $lang['answer']; ?>:*</label>
            <input type="password" name="uanswer" required placeholder="<?php echo $lang['question']; ?>"/><br>
<br>
                
            <input type="submit" id="loginBtn" name="submit" value="<?php echo $lang['changepassword']; ?>"/><br>
        </form>
        </center>
    </section>
</div>

<?php include 'footer.php'; ?>
