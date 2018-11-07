<?php include '../includes/config.php';
include "header.php";



$query = "SELECT * FROM products p INNER JOIN order_products op ON p.id = op.product_id  INNER JOIN orders o
ON o.id = op.order_id INNER JOIN users u ON u.id = o.cust_id WHERE p.added_by = ".$_SESSION['u_id'];

$result = mysqli_query($con,$query);

$query2 = "SELECT SUM(total_price) as total_earnings FROM products p INNER JOIN order_products op ON p.id = op.product_id  INNER JOIN orders o
ON o.id = op.order_id INNER JOIN users u ON u.id = o.cust_id WHERE p.added_by = ".$_SESSION['u_id']." AND o.order_status='Out to delivery'";

$result2 = mysqli_query($con,$query2);
$row2 = $result2-> fetch_array();
$earnings = $row2['total_earnings'];

?>
<style>

    th,td{
        padding: 10px 20px;
    }

</style>

<div class="container">
    <section style="width: 80%; margin-left: 10%; margin-right:10%; margin-top: 5%">
       <p>Total Earnings</p><br>
        <h1>$<?php echo $earnings; ?></h1><br>
        <table>

            <thead>
                <th><?php echo $lang['order']; ?> #</th>
                <th><?php echo $lang['product_name']; ?></th>
               
               
                <th><?php echo $lang['quantity']; ?></th>
                <th>Total Price</th>
                
            </thead>
            <?php
                while($row = $result -> fetch_array()){
                  if($row['order_status']=='Out to delivery'){
                        ?>
                        <tbody>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        
                        <td><?php echo $row['quantity']; ?></td>
                        <td>$<?php echo $row['total_price']; ?></td>
                       
                        </tbody>
                        <?php
                }}
            ?>


        </table>

    </section>
</div>
<?php include '../vendors/footer.php'?>
