<?php   include 'includes/config.php';
include 'header.php';

if(!empty($_REQUEST["action"])) {
    switch($_REQUEST["action"]) {
        case "add":
            if(!empty($_REQUEST["quantity"])) {
                if (new DateTime() > new DateTime($_REQUEST["pickUpDate"].' '.$_REQUEST["timeSlot"])) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Select time is not correct");';
                        echo 'window.location.href="product_detail.php?prodId='.$_REQUEST['pId'].'";';
                        echo '</script>';
                    exit;
                }
                $productQuery ="SELECT * FROM products WHERE id = ".$_REQUEST['pId'];
                $r = mysqli_query($con, $productQuery);
                $result = $r -> fetch_array();
                $itemArray = array($result["id"]=>array('id'=>$result["id"],'name'=>$result["name"], 'quantity'=>$_REQUEST["quantity"],
                    'price'=>$result["price"],'p_date'=>$_REQUEST["pickUpDate"],'p_time'=>$_REQUEST["timeSlot"],'c_ingredients'=>$_REQUEST["custom_ingredients"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($result["id"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($result["id"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
//                        header('location:cart.php');
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="cart.php";';
                        echo '</script>';
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
//                        header('location:cart.php');
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="cart.php";';
                        echo '</script>';
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
//                    header('location:cart.php');
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="cart.php";';
                    echo '</script>';
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_SESSION["cart_item"][$k]['id'] == $_REQUEST['pId']){
                        unset($_SESSION["cart_item"][$k]);
                    }
                }
//                header('location:cart.php');
                echo '<script type="text/javascript">';
                echo 'window.location.href="cart.php";';
                echo '</script>';
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
//            header('location:cart.php');
            echo '<script type="text/javascript">';
            echo 'window.location.href="cart.php";';
            echo '</script>';
            break;
    }
}
?>

<body>
    <div class="container3">
        <br>
        <?php
        if($pid = $_REQUEST['prodId']) {
            $query = "select * from products where id =" . $pid;
            $result1 = mysqli_query($con, $query);
            $row = $result1->fetch_array();

            $query1 = "select * from stock where id = " . $row['stock_id'];
            $result2 = mysqli_query($con, $query1);
            $row1 = $result2->fetch_array();

            $query2 = "select * from deliverytypes where id = " . $row['delivery_type_id'];
            $result3 = mysqli_query($con, $query2);
            $row2 = $result3->fetch_array();

            $query3 = "select * from producttypes where id = " . $row['product_type_id'];
            $result4 = mysqli_query($con, $query3);
            $row3 = $result4->fetch_array();
        }
        ?>
        <div id="midBox">
            <div id="tSec"><h2><?php if($_SESSION['lang'] == 'arabic'){ echo $row2['types_ar']; }else{ echo $row2['types']; }?> <?php echo $lang['item']; ?></h2></div>
            <div id="picBox">
                <br>
                <img src="assets/uploads/<?php echo $row['image'];?>" width="100%" height="400px"/>
                <br>
            </div>
            <div id="desBox">
                    <form method="post" action="product_detail.php?action=add&pId=<?php echo $pid ?>">
                        <h3><?php if($_SESSION['lang'] == 'arabic'){ echo $row['name_ar']; }else{ echo $row['name']; }?></h3>
                        <span id="prTxt"><b><?php echo $lang['price']; ?></b>: <?php echo $row['price'];?> $</span><br>
                        <span><b><?php echo $lang['availability']; ?>:</b> <?php echo $row1['quantity'];?></span>
                        <p><b><?php echo $lang['description']; ?>:</b> <?php if($_SESSION['lang'] == 'arabic'){ echo $row['description_ar']; }else{ echo $row['description']; }?></p>

                        <span><b><?php echo $lang['quantity']; ?>:</b></span>
                        <input style="width:10% !important;" type="number" name="quantity" value="1" size="2" min="1" max="<?php echo $row1['quantity']; ?>" /><br>
                        <br>
                        <span><b><?php echo $lang['pickup_date']; ?>:</b></span><br>
                        <input style="width:30%" type="date" name="pickUpDate" required/><br>
                        <br>
                        <span><b><?php echo $lang['pick_time']; ?>:</b></span><br>
                        <select id="timeSlot" name="timeSlot">
                            <option>09:00 AM</option>
                            <option>01:00 PM</option>
                            <option>04:00 PM</option>
                            <option>06:00 PM</option>
                            <option>09:00 PM</option>
                        </select><br>
                        <br>
                        <span><b><?php echo $lang['delivery']; ?>:</b> <?php if($_SESSION['lang'] == 'arabic'){ echo $row2['types_ar']; }else{ echo $row2['types']; }?></span><br><br>
                        <textarea name="custom_ingredients" id="cs_ingred" value="" placeholder="<?php echo $lang['add_cust']; ?>" rows="5" cols="40"></textarea><br><br><br><br>
                        <input type="submit" name="addCart" id="addCr" value="<?php echo $lang['add_to_cart']; ?>"/>
                        <br>

                    </form>
            </div>
        </div>
        <div id="btBox">
            <br>
        </div>
    </div>
</body>


<?php	include("footer.php"); ?>

