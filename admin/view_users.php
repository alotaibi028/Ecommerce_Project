<?php include '../includes/config.php';
include "header.php";


$query = "SELECT * FROM users where type!='admin' order by id desc";

$result = mysqli_query($con,$query);


if(@$_GET['action']=='del'){
	$uid = $_GET['id'];
	$query = mysqli_query($con,"DELETE FROM `users` WHERE id = '".$uid."'");

    ?>
    <script>
	alert('User deleted');
	window.location.href = "view_users.php";
	</script>
	<?php
	}
?>
<style>

    th,td{
        padding: 10px 20px;
    }

</style>

<div class="container">
    <section style="width: 80%; margin-left: 10%; margin-right:10%; margin-top: 5%">

        <table>

            <thead>
             	<th><?php echo "S.No #"; ?></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Type</th>
                <th><?php echo $lang['action']; ?></th>
            </thead>
            <?php
			                   $sno = 1;

                while($row = $result -> fetch_array()){
                        ?>
                        <tbody>
                        <td><?php echo $sno++ ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><a href="view_users.php?id=<?php echo $row['id'] ?>&action=del"><?php echo $lang['delete']; ?></a></td>
                        </tbody>
                        <?php
                }
            ?>


        </table>

    </section>
</div>
<?php include '../vendors/footer.php'?>
