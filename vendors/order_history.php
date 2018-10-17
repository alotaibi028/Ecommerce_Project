<?php include '../includes/config.php';
include "header.php";

$userId = $_SESSION['u_id'];
$query = "SELECT p.name as 'Name', count(*) AS 'Total' FROM products p INNER JOIN order_products op ON p.id = op.product_id  INNER JOIN orders o
ON o.id = op.order_id WHERE p.added_by = ".$userId." GROUP BY p.name";

$result = mysqli_query($con,$query);

?>
<style>

    th,td{
        padding: 10px 20px;
    }

</style>


<div class="container">
    <section style="width: 80%; margin-left: 35%; margin-right: 35%; margin-top: 5%">

        <table>

            <thead>
            <th><?php echo $lang['product_name']; ?></th>
            <th><?php echo $lang['total_orders']; ?></th>
            </thead>
            <?php
            while($row = $result -> fetch_array()){
                ?>
                <tbody>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Total']; ?></td>
                </tbody>
                <?php
            }
            ?>


        </table>

    </section>
</div>
<?php include '../vendors/footer.php'?>

