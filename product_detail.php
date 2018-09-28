<?php   include 'includes/config.php';
include 'header.php';


if(!empty($_REQUEST["action"])) {
    switch($_REQUEST["action"]) {
        case "add":
            if(!empty($_REQUEST["quantity"])) {
                $productQuery ="SELECT * FROM products WHERE id = ".$_REQUEST['pId'];
                $r = mysqli_query($con, $productQuery);
                $result = $r -> fetch_array();
                $itemArray = array($result["id"]=>array('id'=>$result["id"],'name'=>$result["name"], 'quantity'=>$_REQUEST["quantity"],
                    'price'=>$result["price"]));

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
                        header('location:cart.php');
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        header('location:cart.php');
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                    header('location:cart.php');
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_SESSION["cart_item"][$k]['id'] == $_REQUEST[pId]){
                        unset($_SESSION["cart_item"][$k]);
                    }
                }
                header('location:cart.php');
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            header('location:cart.php');
            break;
    }
}

?>

<style>
    .container3{
        background-color: #ececec;
        overflow: hidden;
    }
    #picBox{
        background-color: #d4d4d4;
        width: 40%;
        margin: 5%;
        margin-top: 2%;
        margin-right: 2% !important;
        float: left;
    }
    #desBox{
        width: 45%;
        margin-right: 2%;
        margin-top: 2%;
        float: left;
    }
    #midBox{
        display: block;
        overflow: hidden;
    }
    #tSec{
        width: 85%;
        margin-top: 2%;
        margin-left: 5%;
    }
    h2{
        color: #4ebae3;
    }
    #desBox input{
        width: 80px;
        padding: 5px 0px;
    }
    #addCr{
        padding: 10px 200px;
        background-color: #4ebae3;
        border-color: #4ebae3;
        color: white;
    }

</style>

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
            <div id="tSec"><h2><?php echo $row3['type'];?> Item</h2></div>
            <div id="picBox">
                <br>
                <img src="assets/uploads/<?php echo $row['image'];?>" width="100%" height="400px"/>
                <br>
            </div>
            <div id="desBox">
                    <form method="post" action="product_detail.php?action=add&pId=<?php echo $pid ?>">
                        <h3><?php echo $row['name'];?></h3>
                        <span id="prTxt">Price: <?php echo $row['price'];?></span><br><br>
                        <span><b>Availability:</b> <?php echo $row1['quantity'];?></span>
                        <p><b>Description:</b> <?php echo $row['description'];?></p>
                        <br>
                        <span>Qty:</span><br>
                        <input type="number" name="quantity" value="1" size="2" /><br>
                        <br>
                        <span><b>Availability:</b> <?php echo $row1['quantity'];?></span><br>
                        <span><b>Delivery:</b> <?php echo $row2['types'];?></span><br><br>
                        <input type="submit" name="addCart" id="addCr" value="Add to cart"/>
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

