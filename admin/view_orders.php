<?php include '../includes/config.php';
include "header.php";



$query = "SELECT * FROM products p INNER JOIN order_products op ON p.id = op.product_id  INNER JOIN orders o
ON o.id = op.order_id INNER JOIN users u ON u.id = o.cust_id";

$result = mysqli_query($con,$query);

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
                <th><?php echo $lang['order']; ?> #</th>
                <th><?php echo $lang['product_name']; ?></th>
                <th><?php echo $lang['customer_name']; ?></th>
                <th><?php echo $lang['wanted_date']; ?></th>
                <th><?php echo $lang['wanted_time']; ?></th>
                <th><?php echo $lang['quantity']; ?></th>
                
                <th><?php echo $lang['order_status']; ?></th>
            </thead>
            <?php
                while($row = $result -> fetch_array()){
                  
                        ?>
                        <tbody>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                        <td><?php echo $row['delivery_date']; ?></td>
                        <td><?php echo $row['delivery_time']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        
                        <td><?php echo $row['order_status']; ?></td>
                        </tbody>
                        <?php
                }
            ?>


        </table>

    </section>
</div>
<?php include '../vendors/footer.php'?>
