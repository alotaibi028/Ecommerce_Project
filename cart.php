<?php include 'includes/config.php';
    include 'header.php';


?>
<div class = "container">
    <div>Shopping Cart</div>

    <a id="btnEmpty" style="float: right; margin-top: -2%" href="product_detail.php?action=empty">Empty Cart</a>
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
    ?>
    <table class="tbl-cart" cellpadding="10" style="margin-left: 10%" cellspacing="1">
    <tbody>
    <tr>
    <th style="text-align:left;">Name</th>
    <th style="text-align:right;" width="5%">Quantity</th>
    <th style="text-align:right;" width="15%">Unit Price</th>
    <th style="text-align:right;" width="15%">Price</th>
    <th style="text-align:right;" width="5%">Remove</th>
    </tr>
    <?php
        foreach ($_SESSION["cart_item"] as $item){
            $item_price = $item["quantity"]*$item["price"];
            ?>
            <tr>
                <td><?php echo $item["name"]; ?></td>
                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
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
        <td colspan="1" align="right">Total: </td>
        <td align="right"><?php echo $total_quantity; ?></td>
        <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
        <td></td>
    </tr>
    </tbody>
    </table>
    <?php
        }else{
    ?>
        <div style="margin: 0 auto; width: 12%; font-size:15px;margin-top: 10%; margin-bottom: 10% "><b>Your Cart is Empty</b></div>
        <?php
    }
    ?>
    </div>
    </div>

<?php include 'footer.php'; ?>