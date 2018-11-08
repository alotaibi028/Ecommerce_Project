<?php
error_reporting(1);
ini_set('display_errors', 1);
?>
<?php include 'includes/config.php';
include 'header.php';

if(!isset($_SESSION['u_id'])){
    header('location:login.php?ref=checkout');
}

if(isset($_REQUEST['stripeToken'])){
    $address2 ="";
    $token = $_REQUEST['stripeToken'];
    $cust_id = $_SESSION['u_id'];
    $address = $_REQUEST['address1'];
    $address2 = $_REQUEST['address2'];
    $city = $_REQUEST['pcity'];
    $country = $_REQUEST['pcountry'];
    $phone = $_REQUEST['pnumber'];
    $pay_method = $_REQUEST['payCheckout'];
    $order_date = date('Y-m-d H:m:s');
    $order_status = 'active';
    $sql = "INSERT INTO orders VALUES (0,".$cust_id.",'".$address."','".$address2."','".$city."','".$country."',
                ".$phone.",'".$pay_method."','".$order_date."','".$order_status."')";
        if(mysqli_query($con,$sql)) {
            $last_id = $con->insert_id;
            $total = 0;
            foreach ($_SESSION["cart_item"] as $item) {
                $prod_id = $item['id'];
                $quantity = $item['quantity'];
                $u_price = $item['price'];
                $t_price = ($item['quantity'] * $item['price']);
                $total+=$t_price;
                $p_date = $item['p_date'];
                $p_time = $item['p_time'];
                $c_ingred = $item['c_ingredients'];
                $sql2 = "INSERT INTO order_products VALUES (".$last_id.",".$prod_id.",".$quantity.",".$u_price.",
                        ".$t_price.",'".$p_date."','".$p_time."','".$c_ingred."')";
                mysqli_query($con, $sql2);
                //unset($_SESSION["cart_item"]);
            }
            
            require_once('stripe-php/init.php');
            $stripe = array(
              "secret_key"      => "sk_test_lokJqoiQrf961Dif9EtDVysy",
              "publishable_key" => "pk_test_rZOYz6k0yWkz494YXqUCZb4b"
            );

            \Stripe\Stripe::setApiKey($stripe['secret_key']);
            
            $customer = \Stripe\Customer::create(array(
                'id' => time(),
                'source'  => $token
            ));

           
            //item information
            $itemName = "Payment for Order: ".$last_id;
            $itemNumber = $last_id;
            $itemPrice = $total*100;
            $currency = "USD";
            $orderID = "";

            //charge a credit or a debit card
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $itemPrice,
                'currency' => $currency,
                'description' => $itemName,
                'metadata' => array(
                'order_id' => $last_id
                )
            ));

            //retrieve charge details
            $chargeJson = $charge->jsonSerialize();

            //check whether the charge is successful
            if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
                //order details 
                $amounts = $chargeJson['amount'];
                $balance_transaction = $chargeJson['balance_transaction'];
                $currency = $chargeJson['currency'];
                $status = $chargeJson['status'];
                $date = date("Y-m-d H:i:s");
                
                $query = "INSERT INTO payments 
                                (id, orderid, amount, transaction, date)
                                VALUES (NULL, '$last_id', '$total' ,'$balance_transaction' , '$date' )";
                if(mysqli_query($con, $query)){
                    echo 'done';
                }else{
                echo     mysqli_error($con);
                }

                // email
// Create the email and send the message
$to =strip_tags($_SESSION['u_email']); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Congratulation Your order has been placed";
 // PREPARE THE BODY OF THE MESSAGE
 // Customer Email
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
				
			$email_body .= '<tr><td>'.$pname.'</td><td style="text-align:right;">'. $item["quantity"].'</td><td  style="text-align:right;">'. "SR ".$item["price"] .'</td><td  style="text-align:right;">'. "SR". number_format($item_price,2).'</td></tr>';
				}
				$total_quantitys += $item["quantity"];
                    $total_prices += ($item["price"]*$item["quantity"]);
			$email_body .= ' <tr><td colspan="1" align="right">'. $lang['total'].' </td><td align="right">'. $total_quantity.' </td><td align="right" colspan="2"><strong>'. "SR ".number_format($total_price, 2).' </strong></td><td></td></tr></tbody></table>';
			$email_body .= "</body></html>";
			
			$headers = "From: otaibimk1428@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
			$headers .= "Reply-To: otaibimk1428@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "X-Mailer: PHP/".phpversion();   
			
mail($to,$email_subject,$email_body,$headers);


// Vendor Email
$vendorArray = array();

			foreach ($_SESSION["cart_item"] as $item){
				
				  $total_quantitys = 0;
            $total_prices = 0;
                    $item_price = $item["quantity"]*$item["price"];
                    $sql = "select * from products where id = ".$item['id'];
                    $result = mysqli_query($con, $sql);
                    $row = $result ->fetch_array();
                    $item_price = $item["quantity"]*$item["price"];
					
					$vendorID = $row['added_by'];
					
					$sqlVendor = " SELECT * FROM users WHERE id=" . $vendorID;
					$resultVendor = mysqli_query($con, $sqlVendor);
					$rowVendor = $resultVendor->fetch_array();
					
					$vendorEmail = $rowVendor['email'];
					
					if($_SESSION['lang'] == 'arabic'){ $pname = $rowVendor['name_ar']; }else{ $pname =  $rowVendor['name'];};
					$total_quantitys += $item["quantity"];
                    $total_prices += ($item["price"]*$item["quantity"]);
					$email_body = '<html><body>';
			$email_body .= '<h2><center>'.$lang['order_summary'].'</center></h2><br />';
			$email_body .= '<div style="background-color: gainsboro"><table class="tbl-cart" cellpadding="10" style="margin-left: 10%" cellspacing="1"><tbody><tr>';
			$email_body .= '<th style="text-align:left;">'.$lang['name'].'</th><th style="text-align:right;" width="5%">'. $lang['quantity'].'</th><th style="text-align:right;" width="25%">'. $lang['unit_price'].'</th><th style="text-align:right;" width="25%">'. $lang['price'].'</th> </tr>';
				
					$email_body .= '<tr><td>'.$pname.'</td><td style="text-align:right;">'. $item["quantity"].'</td><td  style="text-align:right;">'. "SR ".$item["price"] .'</td><td  style="text-align:right;">'. "SR ". number_format($item_price,2).'</td></tr>';
				$email_body .= ' <tr><td colspan="1" align="right">'. $lang['total'].' </td><td align="right">'. $total_quantity.' </td><td align="right" colspan="2"><strong>'. "SR ".number_format($total_price, 2).' </strong></td><td></td></tr></tbody></table>';
			$email_body .= "</body></html>";
			
					$headers = "From: otaibimk1428@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
						$headers .= "Reply-To: otaibimk1428@gmail.com\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						$headers .= "X-Mailer: PHP/".phpversion();   
						mail($vendorEmail,'You have a new Order',$email_body,$headers);
					
					}
				
			
			

                unset($_SESSION["cart_item"]);

                    $statusMsg = 1;
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="orderstatus.php";';
                    echo '</script>';
                    

            }

     






        //            header('location:orderstatus.php');
                    
                }
            }
			
			
			
			echo "You cannot access this page. 403 Forbidden";

