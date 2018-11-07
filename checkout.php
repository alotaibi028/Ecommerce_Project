<?php include 'includes/config.php';
include 'header.php';

if(!isset($_SESSION['u_id'])){
    header('location:login.php?ref=checkout');
}

if(isset($_REQUEST['checkout'])){

    $address2 ="";
    $cust_id = $_SESSION['u_id'];
    $address = $_REQUEST['address1'];
    $address2 = $_REQUEST['address2'];
    $city = $_REQUEST['pcity'];
    $country = $_REQUEST['pcountry'];
    $phone = $_REQUEST['pnumber'];
    $pay_method = $_REQUEST['payCheckout'];
    $order_date = date('Y-m-d H:m:s');
    $order_status = 'active';

    if($pay_method == 'pay_now'){
        $_SESSION['checkout_address'] = $address;
        $_SESSION['checkout_address2'] = $address2;
        $_SESSION['checkout_city'] = $city;
        $_SESSION['checkout_country'] = $country;
        $_SESSION['checkout_phone'] = $phone;
//        header('location: processing.php');
        echo "<script>alert('Not Yet Completed');</script>";
    }else{
        $sql = "INSERT INTO orders VALUES (0,".$cust_id.",'".$address."','".$address2."','".$city."','".$country."',
                ".$phone.",'".$pay_method."','".$order_date."','".$order_status."')";
        if(mysqli_query($con,$sql)) {
            $last_id = $con->insert_id;

            foreach ($_SESSION["cart_item"] as $item) {
                $prod_id = $item['id'];
                $quantity = $item['quantity'];
                $u_price = $item['price'];
                $t_price = ($item['quantity'] * $item['price']);
                $p_date = $item['p_date'];
                $p_time = $item['p_time'];
                $c_ingred = $item['c_ingredients'];
                $sql2 = "INSERT INTO order_products VALUES (".$last_id.",".$prod_id.",".$quantity.",".$u_price.",
                        ".$t_price.",'".$p_date."','".$p_time."','".$c_ingred."')";
                mysqli_query($con, $sql2);
                unset($_SESSION["cart_item"]);
            }
//            header('location:orderstatus.php');
            echo '<script type="text/javascript">';
            echo 'window.location.href="orderstatus.php";';
            echo '</script>';
        }
    }
}


?>
<style>
    .secBox{
        width: 80%;
    }
    
    
    input[type="number"], input[type="password"] {
    border: 1px solid #ddd;
    padding: 0 15px;
    line-height: 38px;
    height: 38px;
    border-radius: 3px;
    box-shadow: none !important;
    -webkit-appearance: none !important;
    appearance: none !important;
}
    
    
</style>
<div class = "container" style="display: inline-block; width: 100%;">

    <section style="width: 50%; float:left; margin-left: 8%; margin-top: 5%">
        <h2><?php echo $lang['confirm_order']; ?></h2><br>
        <form method="post" id="addForm" action="checkout.php">

            <div class="secBox">
                <label><?php echo $lang['first_name']; ?>:*</label>
                <input type="text" name="fname" value="<?php echo $_SESSION['u_fname']; ?>" placeholder="Enter First Name" />
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['last_name']; ?>:*</label>
                <input type="text" name="lname" value="<?php echo $_SESSION['u_lname']; ?>" placeholder="Enter Last Name" />
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['address_1']; ?>:*</label>
                <input type="text" name="address1" placeholder="" value="" required/>
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['address_2']; ?>:</label>
                <input type="text" name="address2" value="" placeholder=""/>
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['city']; ?>:*</label>
                <input type="text" name="pcity" placeholder="<?php echo $lang['city']; ?>" required/>
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['country']; ?>:*</label>
                <input type="text" name="pcountry" placeholder="<?php echo $lang['country']; ?>" required/>
            </div><br>

<!--            <div  class="secBox">-->
<!--                <label>Post Code:</label>-->
<!--                <input type="number" name="pstock" placeholder="Enter PostCode">-->
<!--            </div>-->

            <div  class="secBox">
                <label><?php echo $lang['email']; ?>:*</label>
                <input type="email" name="pemail" value="<?php echo $_SESSION['u_email']; ?>" placeholder="Enter Email" />
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['phone_no']; ?>:*</label>
                <input type="number" name="pnumber" id="price" placeholder="<?php echo $lang['enter_phone_no']; ?>" required/>
            </div><br><br>

            <div class="">
                <label><?php echo $lang['payment_type']; ?>:*</label>
                <div class="innerBox">
                    <span><input style="margin-left: 1%" type="radio" name="payCheckout" value="0" checked><?php echo $lang['pay_on_delivery']; ?></span>
                    <span><input type="radio" name="payCheckout" value="1"><?php echo $lang['pay_now']; ?></span>
                </div>
            </div><br>
            <div class="">
                <label><?php echo $lang['delivery_type']; ?>:*</label>
                <div class="innerBox">
                    <span><input style="margin-left: 1%" type="radio" name="delivery_type" value="0" checked><?php echo $lang['with_delivery']; ?></span>
                    <span><input type="radio" name="delivery_type" value="1"><?php echo $lang['no_delivery']; ?></span>
                </div>
            </div><br><br>

            <div  class="subBtn">
                <input type="submit" name="checkout" value="<?php echo $lang['proceed']; ?>"/>
            </div>

        </form>
    </section>
    <section style="width: 35%; float:left; margin-left: 1%; margin-top: 5%">
        <?php
        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
            ?>
        <h2><?php echo $lang['order_summary']; ?></h2><br>
        <div style="background-color: gainsboro">
            <table class="tbl-cart" cellpadding="10" style="margin-left: 10%" cellspacing="1">
                <tbody>
                <tr>
                    <th style="text-align:left;"><?php echo $lang['name']; ?></th>
                    <th style="text-align:right;" width="5%"><?php echo $lang['quantity']; ?></th>
                    <th style="text-align:right;" width="25%"><?php echo $lang['unit_price']; ?></th>
                    <th style="text-align:right;" width="25%"><?php echo $lang['price']; ?></th>
                </tr>
                <?php
                foreach ($_SESSION["cart_item"] as $item){
                    $item_price = $item["quantity"]*$item["price"];
                    $sql = "select * from products where id = ".$item['id'];
                    $result = mysqli_query($con, $sql);
                    $row = $result ->fetch_array();
                    $item_price = $item["quantity"]*$item["price"];
                    ?>
                    <tr>
                        <td><?php if($_SESSION['lang'] == 'arabic'){ echo $row['name_ar']; }else{ echo $row['name']; } ?></td>
                        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                        <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                        <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
                }
                ?>

                <tr>
                    <td colspan="1" align="right"><?php echo $lang['total']; ?>: </td>
                    <td align="right"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>

    </section>
</div>

<?php include 'footer.php'; ?>