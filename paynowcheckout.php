<?php include 'includes/config.php';
include 'header.php';

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

                

                    $statusMsg = 1;
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="orderstatus.php";';
                    echo '</script>';
                    

            }

     






        //            header('location:orderstatus.php');
                    
                }
            }

