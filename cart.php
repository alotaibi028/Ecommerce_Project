<?php include 'includes/config.php';
    include 'header.php';

/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 9/8/2018
 * Time: 11:03 PM
 */
?>
<div class = "container">
    <div><?php echo $lang['shopping_cart']; ?></div>

    <a id="btnEmpty" style="float: right; margin-top: -2%" href="product_detail.php?action=empty"><?php echo $lang['empty_cart']; ?></a>
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
    ?>
    <table class="tbl-cart" cellpadding="10" style="margin-left: 10%" cellspacing="1">
    <tbody>
    <tr>
    <th style="text-align:left;"><?php echo $lang['name']; ?></th>
    <th style="text-align:right;" width="5%"><?php echo $lang['quantity']; ?></th>
    <th style="text-align:right;" width="15%"><?php echo $lang['unit_price']; ?></th>
    <th style="text-align:right;" width="15%"><?php echo $lang['pickup_date']; ?></th>
    <th style="text-align:right;" width="15%"><?php echo $lang['pickup_time']; ?></th>
    <th style="text-align:right;" width="15%"><?php echo $lang['price']; ?></th>
    <th style="text-align:right;" width="5%"><?php echo $lang['remove']; ?></th>
    </tr>
    <?php
        foreach ($_SESSION["cart_item"] as $item){
            $item_price = $item["quantity"]*$item["price"];
            $sql = "select * from products where id = ".$item['id'];
            $result = mysqli_query($con, $sql);
            $row = $result ->fetch_array();
            ?>
            <tr>
                <td><?php if($_SESSION['lang'] == 'arabic'){ echo $row['name_ar']; }else{ echo $row['name']; }?></td>
                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                <td  style="text-align:right;"><?php echo $item["p_date"]; ?></td>
                <td  style="text-align:right;"><?php echo $item["p_time"]; ?></td>
                <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                <td  style="text-align:center;"><a href="product_detail.php?action=remove&pId=<?php echo $item['id']; ?>">
                        <input type="button" value="X"/></a></td>
            </tr>
            <?php
            $total_quantity += $item["quantity"];
            $total_price += ($item["price"]*$item["quantity"]);
        }
            ?>

    <tr>
        <td colspan="4" align="right"><?php echo $lang['total']; ?>: </td>
        <td align="right"><?php echo $total_quantity; ?></td>
        <td align="right" colspan="1"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
        <td></td>
    </tr>
    </tbody>
    </table>
        <a href="checkout.php">
            <input type="button" style="padding: 10px 50px; margin-right: 8%; float: right" name="addCart" id="addCr" value="<?php echo $lang['checkout']; ?>"/>
            <br><br>
        </a>
    <?php
        }else{
    ?>
        <div style="margin: 0 auto; width: 12%; font-size:15px;margin-top: 10%; margin-bottom: 10% "><b><?php echo $lang['your_cart_empty']; ?></b></div>
        <?php
    }
    ?>

    </div>
    </div>

<?php include 'footer.php'; ?>