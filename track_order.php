<?php include 'includes/config.php';
include "header.php";
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 10/7/2018
 * Time: 7:39 PM
 */
$query = "SELECT * FROM orders o WHERE o.cust_id = ".$_SESSION['u_id']." group by o.id";

$result = mysqli_query($con,$query);

?>
<style>

    th,td{
        padding: 10px 20px;
    }

</style>

<div class="container">
    <section style="width: 80%; margin-left: 30%; margin-right: 30%; margin-top: 5%">

        <table>

            <thead>
            <th><?php echo $lang['order']; ?> #</th>
            <th><?php echo $lang['order_placed_on']; ?></th>
            <th><?php echo $lang['status']; ?></th>
            <th><?php echo $lang['action']; ?></th>
            </thead>
            <?php
            while($row = $result -> fetch_array()){
                ?>
                <tbody>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['order_status']; ?></td>
                <td><a href="summary.php?id=<?php echo $row['id']; ?>"><?php echo '<input type="button" value="'.$lang['details'].'">' ?></a></td>
                </tbody>
                <?php
            }
            ?>


        </table>

    </section>
</div>

<?php include 'footer.php' ?>
