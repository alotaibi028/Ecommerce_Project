<?php include '../includes/config.php';
include "header.php";


$query = "SELECT * FROM products";

$result = mysqli_query($con,$query);


if(@$_GET['action']=='del'){
	$pid = $_GET['id'];
	$query = mysqli_query($con,"DELETE FROM `products` WHERE id = '".$pid."'");

    ?>
    <script>
	alert('product deleted');
	window.location.href = "view_products.php";
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
                <th><?php echo $lang['product_name']; ?></th>
                <th><?php echo $lang['description']; ?></th>
                <th><?php echo $lang['price'];  ?></th>
              
            </thead>
            <?php
			                   $sno = 1;

                while($row = $result -> fetch_array()){
                    
                        ?>
                        <tbody>
                        <td><?php echo $sno++ ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td>$<?php echo $row['price']; ?></td>
                        
                        </tbody>
                        <?php
                }
            ?>


        </table>

    </section>
</div>
<?php include '../vendors/footer.php'?>
