<?php include 'includes/config.php';
include "header.php";



$query = "SELECT * FROM orders o WHERE o.id = ".$_REQUEST['id']." group by o.id";

$result = mysqli_query($con,$query);

?>
<style>

    th,td{
        padding: 10px 20px;
    }

</style>

<div class="container">
    <section style=" margin-left: 15%; margin-top: 5%;margin-right: 15%;">
       <?php
       if($row = $result -> fetch_array()){
        $query2 = "SELECT * FROM order_products op INNER JOIN products p ON op.product_id = p.id
        WHERE op.order_id = ".$_REQUEST['id'];
        $result2 = mysqli_query($con,$query2);
        ?>
        <h1><?php echo $lang['my_account']; ?></h1><br><br>
        <h4><span style="color: crimson"><?php echo $lang['order']; ?> # <?php echo $_REQUEST['id']; ?> </span> <?php echo $lang['placed_on']; ?> <?php echo $row['order_date']; ?>
            <?php echo $lang['is_currently']; ?> <?php echo $row['order_status']; ?></h4><br><br>
        <div style="margin-left: 20%;margin-right: 20%">
            <h2><?php echo $lang['order_details']; ?></h2>
            <table>
                <thead>
                <th><?php echo $lang['products']; ?></th>
                <th><?php echo $lang['price']; ?></th>
                <th><?php echo $lang['pickup_date']; ?></th>
                <th><?php echo $lang['pick_time']; ?></th>
                </thead>
                <?php
                $total = 0;
                while($row2 = $result2 -> fetch_array()){

                    ?>
                    <tbody>
                    <td ><?php echo $row2['name']; ?></td>
                    <td><?php echo $row2['price']; ?></td>
                    <td><?php echo $row2['delivery_date']; ?></td>
                    <td><?php echo $row2['delivery_time']; ?></td>
                    </tbody>
                    <?php
                    $total += $row2['price'];
                }
                ?>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="color: #4ebae3"><b><?php echo $lang['shipping']; ?>:</b></td>
                        <?php if($row['pay_method'] == 0){
                            echo '<td>Pay On Delivery</td>';
                        }else{
                            echo '<td>Paid Online</td>';
                        }?>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="color: #4ebae3"><b><?php echo $lang['cart_total']; ?></b></td>
                        <td><?php echo $total; ?></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>

            </table>
        </div>

    </section>
</div>

<?php include 'footer.php' ?>
