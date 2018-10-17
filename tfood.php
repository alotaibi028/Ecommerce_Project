<?php include 'includes/config.php';
include 'header.php';
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 9/12/2018
 * Time: 9:00 PM
 */

$queryTraditional = "select * from products where product_type_id=1";
$resultTr = mysqli_query($con, $queryTraditional);
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
            if(mysqli_num_rows($resultTr) > 0) {
                while ($rowTr = $resultTr->fetch_array()) {
                    $queryD2 = "select * from deliverytypes where id = " . $rowTr['delivery_type_id'];
                    $resultD2 = mysqli_query($con, $queryD2);
                    $rowD2 = $resultD2->fetch_array();
                    ?>
                    <div class="product-list-content equal-elem">
                        <div class="product-media">
                            <figure>
                                <a href='product_detail.php?prodId=<?php echo $rowTr['id']; ?>'><img
                                        src="assets/uploads/<?php echo $rowTrt['image']; ?>"
                                        alt="feature" width="202" height="239">
                                </a>
                            </figure>
                        </div>
                        <a href="product_detail.php?prodId=<?php echo $rowTr['id']; ?>"
                           class="feature-slide-name"><?php echo $rowTr['name']; ?>
                            <span style="font-size: 12px;">
											(<?php echo $lang['delivery']; ?>: <?php echo $rowD2['types']; ?>)</span></a>
                        <div class="feature-slide-cost">
                            <span class="price"><?php echo $lang['price']; ?>: <?php echo $rowTr['price']; ?></span>
                        </div>
                    </div>
                <?php }
            }else{
                echo '<br><br><h2 class="no_msg" style="">'.$lang['no_product'].'</h2><br><br>';
            }
            ?>
        </div>
    </div>
</div>
</body>

<?php include 'footer.php' ?>
