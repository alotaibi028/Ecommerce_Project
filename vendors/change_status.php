<?php include '../includes/config.php';
include "header.php";


if(isset($_REQUEST['send'])){
    $oId = $_REQUEST['order_id'];
    $oStatus = $_REQUEST['or_status'];

    $sql = "UPDATE orders SET order_status = '".$oStatus."' WHERE id = ".$oId;
    if(mysqli_query($con,$sql)){
        echo '<script>alert("Updated Successfully")</script>';
    }
}

$query = "SELECT * FROM products p INNER JOIN order_products op ON p.id = op.product_id  INNER JOIN orders o
ON o.id = op.order_id INNER JOIN users u ON u.id = o.cust_id WHERE p.added_by = ".$_SESSION['u_id'];

$result = mysqli_query($con,$query);

?>
<style>

    th,td{
        padding: 10px 20px;
    }

</style>

<div class="container">
    <section style="width: 80%; margin-left: 20%; margin-right:10%; margin-top: 5%">

        <table>

            <thead>
            <th><?php echo $lang['order']; ?> #</th>
            <th><?php echo $lang['not_started']; ?></th>
            <th><?php echo $lang['is_making']; ?></th>
            <th><?php echo $lang['out_to_deliver']; ?></th>
            <th><?php echo $lang['finished']; ?></th>
            <th><?php echo $lang['order_status']; ?></th>
            <th><?php echo $lang['action']; ?></th>
            </thead>
            <?php
            while($row = $result -> fetch_array()){
               
                ?>
                <tbody>
                <form method="POST" action="change_status.php">
                    <td><input type="number" name="order_id" value="<?php echo $row['order_id']; ?>" hidden><?php echo $row['order_id']; ?></td>
                    <td><input type="radio" name="or_status" value="Not Started" <?php if($row['order_status'] == 'Not Started'){ echo 'checked'; }?>></td>
                    <td><input type="radio" name="or_status" value="Is Making" <?php if($row['order_status'] == 'Is Making'){ echo 'checked'; }?>></td>
                    <td><input type="radio" name="or_status"value="Out to delivery" <?php if($row['order_status'] == 'Out to delivery'){ echo 'checked'; }?>></td>
                    <td><input type="radio" name="or_status" value="Finished" <?php if($row['order_status'] == 'Finished'){ echo 'checked'; }?>></td>
                    
                    <td><?php if($row['order_status'] == 'Not Started'){ echo $lang['not_started']; }else
                        if($row['order_status'] == 'active'){ echo $lang['is_making']; }else
                        if($row['order_status'] == 'Finished'){ echo $lang['finished']; }else
                        if($row['order_status'] == 'Out to delivery'){ echo $lang['out_to_deliver']; }else?></td>
                    <td><input type="submit"  name="send" value="<?php echo $lang['send']; ?>"></td>
                </form>
                </tbody>
                <?php
            }
            ?>


        </table>

    </section>
</div>
<?php include '../vendors/footer.php'?>

