<?php include 'includes/config.php';
include 'header.php';
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 9/11/2018
 * Time: 10:35 PM
 */
$queryDesert = "select * from products where product_type_id=3";
$resultDesert = mysqli_query($con, $queryDesert);
?>
<head>
    <style>
        .sections {
            padding: 10px;
        }
        .secBx {
            width:100%;
            border: 1px solid #d4d4d4;
            display: inline-block;
        }
        .secItm{
            float: left;
            margin: 10px;
        }
        .cartBtn input{
            margin-left: 28%;
            width: 35%;
            background: rgba(3,2,1,0);
            border: 1px solid #4ebae3;
            border-radius: 10px;
            padding: 5px 10px;
            color: #4ebae3;
            margin-top: 3%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sections">
            <div class="secBx">
            <?php

            if(mysqli_num_rows($resultDesert) > 0) {
                while ($rowDesert = $resultDesert->fetch_array()) {
                $queryD = "select * from deliverytypes where id = " . $rowDesert['delivery_type_id'];
                $resultD = mysqli_query($con, $queryD);
                $rowD = $resultD->fetch_array();
            ?>
            <div class="secItm">
                <div class="product-media">
                    <figure>
                        <a href='product_detail.php?prodId=<?php echo $rowDesert['id']; ?>'><img
                                src="assets/uploads/<?php echo $rowDesert['image']; ?>"
                                alt="feature" width="202" height="239">
                        </a>
                    </figure>
                </div>
                <a href="product_detail.php?prodId=<?php echo $rowDesert['id']; ?>"
                   class="feature-slide-name"><?php echo $rowDesert['name']; ?>
                    <span style="font-size: 10px;">
                        (Delivery: <?php echo $rowD['types']; ?>)</span></a>
                <div class="feature-slide-cost">
                    <span class="price">Price: <?php echo $rowDesert['price']; ?></span>
                </div>
                <div class="cartBtn">
                    <a href="cart.php"><input type="button" value="Add to cart"/></a>
                </div>
            </div>
                <?php }
                }else{
                    echo '<br><br><h2 style="margin: 20px 0px;">No Product Available</h2><br><br>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php' ?>
