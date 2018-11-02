<?php
include '../includes/config.php';
include 'header.php';

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
				$total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
			$email_body .= ' <tr><td colspan="1" align="right">'. $lang['total'].' </td><td align="right">'. $total_quantity.' </td><td align="right" colspan="2"><strong>'. "$ ".number_format($total_price, 2).' </strong></td><td></td></tr></tbody></table>';
			$email_body .= "</body></html>";

echo $email_body;

?>
