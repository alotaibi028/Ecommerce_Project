<?php include 'includes/config.php';
include 'header.php';
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 9/12/2018
 * Time: 8:56 PM
 */

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
            if(mysqli_num_rows($resultBaked) > 0) {
                while ($rowBaked = $resultBaked->fetch_array()) {
                    $queryD1 = "select * from deliverytypes where id = " . $rowBaked['delivery_type_id'];
                    $resultD1 = mysqli_query($con, $queryD1);
                    $rowD1 = $resultD1->fetch_array();
                    ?>
                    <div class="product-list-content equal-elem">
                        <div class="product-media">
                            <figure>
                                <a href='product_detail.php?prodId=<?php echo $rowBaked['id']; ?>'><img src="assets/uploads/<?php echo $rowBaked['image']; ?>"
                                                                                                        alt="feature" width="202" height="239">
                                </a>
                            </figure>
                        </div>
                        <a href="product_detail.php?prodId=<?php echo $rowBaked['id']; ?>" class="feature-slide-name" style="font-size: 15px;"><?php echo $rowBaked['name']; ?>
                            <span style="font-size: 12px;">(<?php echo $lang['delivery']; ?>: <?php echo $rowD1['types']; ?>)</span></a>
                        <div class="feature-slide-cost">
                            <span class="price"><?php echo $lang['price']; ?>: <?php echo $rowBaked['price']; ?></span>
                        </div>

                    </div>
                <?php }
            }else{
                echo '<h2 class="no_msg">'.$lang['no_product'].'</h2>';
            }
            ?>
        </div>
    </div>
</div>
</body>

<?php include 'footer.php' ?>
