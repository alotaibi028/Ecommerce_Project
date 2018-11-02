<?php include 'includes/config.php';
include 'header.php';

$queryBaked = "select * from products where product_type_id=2";
$resultBaked = mysqli_query($con, $queryBaked);
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
            /*margin-left: 28%;*/
            width: 35%;
            background: rgba(3,2,1,0);
            border: 1px solid #4ebae3;
            border-radius: 10px;
            padding: 5px 10px;
            color: #4ebae3;
            margin-top: 3%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sections">
            <div class="secBx">
            <?php

            if(mysqli_num_rows($resultBaked) > 0) {
                while ($rowBaked = $resultBaked->fetch_array()) {
                $queryD = "select * from deliverytypes where id = " . $rowBaked['delivery_type_id'];
                $resultD = mysqli_query($con, $queryD);
                $rowD = $resultD->fetch_array();
            ?>
            <div class="secItm">
                <div class="product-media">
                    <figure>
                        <a href='product_detail.php?prodId=<?php echo $rowBaked['id']; ?>'><img
                                src="assets/uploads/<?php echo $rowBaked['image']; ?>"
                                alt="feature" style="width:230px;height:150px">
                        </a>
                    </figure>
                </div>
                <center>
                <a href="product_detail.php?prodId=<?php echo $rowBaked['id']; ?>"
                   class="feature-slide-name"><?php echo $rowBaked['name']; ?></a><br>
                    
                <div class="feature-slide-cost">
                    <span class="price"><?php echo $lang['price']; ?>: <?php echo $rowBaked['price']; ?></span>
                </div>
                <div class="cartBtn">
                    <a href="product_detail.php?prodId=<?php echo $rowBaked['id']; ?>"><input type="button" value="<?php echo $lang['add_to_cart']; ?>"/></a>
                </div>
                </center>
            </div>
                <?php }
                }else{
                    echo '<br><br><h2 class="no_msg">'.$lang['no_product'].'</h2><br><br>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php' ?>

