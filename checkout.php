

<?php include 'includes/config.php';
include 'header.php';

if(!isset($_SESSION['u_id'])){
    header('location:login.php?ref=checkout');
}

if(isset($_REQUEST['checkout'])){
    echo 'success';
    $address2 ="";
    $cust_id = $_SESSION['u_id'];
    $address = mysqli_real_escape_string($con, $_REQUEST['address1']);
    $address2 = mysqli_real_escape_string($con, $_REQUEST['address2']);
    $city = mysqli_real_escape_string($con, $_REQUEST['pcity']);
    $country = mysqli_real_escape_string($con, $_REQUEST['pcountry']);
    $phone = mysqli_real_escape_string($con, $_REQUEST['pnumber']);
    $pay_method = mysqli_real_escape_string($con, $_REQUEST['payCheckout']);
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
                $total+=$u_price;
                $t_price = ($item['quantity'] * $item['price']);
                $p_date = $item['p_date'];
                $p_time = $item['p_time'];
                $c_ingred = $item['c_ingredients'];
                $sql2 = "INSERT INTO order_products VALUES (".$last_id.",".$prod_id.",".$quantity.",".$u_price.",
                        ".$t_price.",'".$p_date."','".$p_time."','".$c_ingred."')";
                mysqli_query($con, $sql2);
            }
			// email
// Create the email and send the message
$to =strip_tags($_SESSION['u_email']); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Congratulation Your order has been placed";
 // PREPARE THE BODY OF THE MESSAGE
  $total_quantitys = 0;
            $total_prices = 0;
		$email_body = '<html><body>';
			$email_body .= '<h2><center>'.$lang['order_summary'].'</center></h2><br />';
			$email_body .= '<div style="background-color: gainsboro"><table class="tbl-cart" cellpadding="10" style="margin-left: 10%" cellspacing="1"><tbody><tr>';
			$email_body .= '<th style="text-align:left;">'.$lang['name'].'</th><th style="text-align:right;" width="5%">'. $lang['quantity'].'</th><th style="text-align:right;" width="25%">'. $lang['unit_price'].'</th><th style="text-align:right;" width="25%">'. $lang['price'].'</th> </tr>';
				foreach ($_SESSION["cart_item"] as $item){
                    $item_price = $item["quantity"]*$item["price"];
                    $sql = "select * from products where id = ".$item['id'];
                    $result = mysqli_query($con, $sql);
                    $row = $result ->fetch_array();
                    $item_price = $item["quantity"]*$item["price"];
					if($_SESSION['lang'] == 'arabic'){ $pname = $row['name_ar']; }else{ $pname =  $row['name'];};
				
			$email_body .= '<tr><td>'.$pname.'</td><td style="text-align:right;">'. $item["quantity"].'</td><td  style="text-align:right;">'. "$ ".$item["price"] .'</td><td  style="text-align:right;">'. "$ ". number_format($item_price,2).'</td></tr>';
				}
				$total_quantitys += $item["quantity"];
                    $total_prices += ($item["price"]*$item["quantity"]);
			$email_body .= ' <tr><td colspan="1" align="right">'. $lang['total'].' </td><td align="right">'. $total_quantity.' </td><td align="right" colspan="2"><strong>'. "$ ".number_format($total_price, 2).' </strong></td><td></td></tr></tbody></table>';
			$email_body .= "</body></html>";
			
			$headers = "From: otaibimk1428@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
			$headers .= "Reply-To: otaibimk1428@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "X-Mailer: PHP/".phpversion();   
mail($to,$email_subject,$email_body,$headers);
                unset($_SESSION["cart_item"]);

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
                <input type="text" pattern=
"[أ-يa-zA-Z ]{1,}" title="Only Alphabets or arabic" name="fname" value="<?php echo $_SESSION['u_fname']; ?>" placeholder="Enter First Name" />
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['last_name']; ?>:*</label>
                <input type="text"  pattern=
"[أ-يa-zA-Z ]{1,}" title="Only Alphabets or arabic" name="lname" value="<?php echo $_SESSION['u_lname']; ?>" placeholder="Enter Last Name" />
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
                <input type="text" name="pnumber"  pattern="[0-9]{10}" title="Valid Phone number only" id="price" placeholder="<?php echo $lang['enter_phone_no']; ?>" required/>
            </div><br><br>
            
            <div class="">
                <label><?php echo $lang['payment_type']; ?>:*</label>
                <div class="innerBox">
                    <span><input class="payselect" style="margin-left: 1%" type="radio" name="payCheckout" value="0" checked><?php echo $lang['pay_on_delivery']; ?></span>
                    <span><input class="payselect" type="radio" name="payCheckout" value="1"><?php echo $lang['pay_now']; ?></span>
                </div>
            </div><br>
            <div id="paymentbox" style="display:none">
            <div  class="secBox">
                <label>Card No:*</label>
                <input type="text" name="card_num" id="card_num" placeholder="" />
            </div><br>
            
            <div  class="secBox">
                <label>Exp Month:*</label>
                <input type="text" name="exp_month" id="exp_month" placeholder="" />
            </div><br>
               
            <div  class="secBox">
                <label>Exp Year:*</label>
                <input type="text" name="exp_year" id="exp_year" placeholder="" />
            </div><br>
            
            <div  class="secBox">
                <label>CVC Code:*</label>
                <input type="text" name="cvc" id="cvc" placeholder="" />
            </div><br>
            </div>
            <div class="payment-errors" style="color:red"></div>
            <div  class="subBtn"><br>
                <input type="submit" id="checkoutBtn" name="checkout" value="<?php echo $lang['proceed']; ?>"/>
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
                        <td  style="text-align:right;"><?php echo $item["price"].' '.$lang['currency']; ?></td>
                        <td  style="text-align:right;"><?php echo number_format($item_price,2).' '.$lang['currency']; ?></td>
                    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
                }
                ?>

                <tr>
                    <td colspan="1" align="right"><?php echo $lang['total']; ?>: </td>
                    <td align="right"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="2"><strong><?php echo number_format($total_price, 2).' '.$lang['currency']; ?></strong></td>
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
<script>
$(".payselect").click(function(){
    var value = $(this).val();
    if(value==1){
        $("#paymentbox").show();
    }else{
       $("#paymentbox").hide();
    }

});
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>

//set your publishable key
Stripe.setPublishableKey('pk_test_rZOYz6k0yWkz494YXqUCZb4b');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        //$('#checkoutBtn').attr("value", 'Book Now');
        //display the errors on the form
        $(".payment-errors").html('<div class="alert alert-danger"><strong>Error! </strong>'+response.error.message+' </div>');
    }else{
        var form$ = $("#addForm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        form$.attr('action', 'paynowcheckout.php');
        form$.submit();
    }
}
    
$("#checkoutBtn").click(function(){
     var value = $('input[name=payCheckout]:checked').val();
     if(value==1){
        Stripe.createToken({
        number: $('#card_num').val(),
        cvc: $('#cvc').val(),
        exp_month: $('#exp_month').val(),
        exp_year: $('#exp_year').val()
    }, stripeResponseHandler);
      return false;
     }else{
        //$("#addForm").submit();
     }
      
    });
  
</script>

