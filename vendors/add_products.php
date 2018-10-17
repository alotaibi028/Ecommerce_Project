<?php include '../includes/config.php';


$query = "select * from producttypes";
$result = mysqli_query($con,$query);
$query1 = "select * from deliverytypes";
$result1 = mysqli_query($con,$query1);


if(isset($_REQUEST['submit'])){

    $pName = $_REQUEST['pname'];
    $pDesc = $_REQUEST['pdesc'];
    $pPrice = $_REQUEST['pprice'];
    $pDiscount = $_REQUEST['pdiscount'];
    $pTypeId = $_REQUEST['ptype'];
    $pStock = $_REQUEST['pstock'];
    $pDelId = $_REQUEST['pdelivery'];
    $pDate = date('Y-m-d H:i:s');

    $targetDir = "../assets/uploads";

    $file_name=$_FILES['pimg']['name'];
    $tmp_file_at_server = $_FILES['pimg']['tmp_name'];
    $file_extension = substr($file_name, strlen($file_name) - 3, 3);

    if($file_extension != 'jpg' && $file_extension != 'png' && $file_extension != 'jpeg' &&
        $file_extension != 'JPG' && $file_extension != 'PNG' && $file_extension != 'JPEG'){
        echo '<script>alert("Error uploading file");</script>';
    }else {
        $query2 = "insert into stock values (0," . $pStock . ")";
        if (mysqli_query($con, $query2)) {
            $stock_id = $con->insert_id;

            if (is_uploaded_file($tmp_file_at_server)) {
                move_uploaded_file($tmp_file_at_server,
                    $targetDir . '/' . $pName . '_' . $stock_id . '.' . $file_extension);
            }

            $pImg = $pName . '_' . $stock_id . '.' . $file_extension;

            $query3 = "insert into products values (0,'" . $pName . "','" . $pDesc . "'," . $pPrice . "," . $pDiscount . ",
                            '" . $pImg . "','".$pDate."'," . $stock_id . "," . $pTypeId . "," . $pDelId . ")";
            if (mysqli_query($con, $query3)) {
                echo '<script>alert("Successfully Inserted");</script>';
            }
        } else {
            echo '<script>alert("Error adding products");</script>';
        }
    }

}


?>

<?php include "header.php"; ?>
<style>
    .secBox label{
        margin-left: 3% !important;
    }
    .subBtn{
        margin-right: 25%;
    }
</style>

<div class="container">
    <section style="width: 80%; margin-left: 28%; margin-right: 28%; margin-top: 5%">
        <h2><?php echo $lang['add_products']; ?></h2><br>
        <form method="post" id="addForm" action="add_products.php" enctype="multipart/form-data">

            <div class="secBox">
                <label><?php echo $lang['product_name']; ?>:</label>
                <input type="text" id="name" name="pname" placeholder="<?php echo $lang['enter_product_name']; ?>"/>
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['description']; ?>:</label>
                <textarea id="desc" name="pdesc" placeholder="<?php echo $lang['enter_product_desc']; ?>"></textarea>
            </div><br>

            <div class="secBox">
                    <label><?php echo $lang['price']; ?></label>
                    <input type="number" name="pprice" id="price" placeholder="<?php echo $lang['enter_product_price']; ?>"/>
            </div><br>
            <div class="secBox">
                    <label><?php echo $lang['discount']; ?> (%)</label>
                    <input type="number" id="price" name="pdiscount" placeholder="<?php echo $lang['discount']; ?> %"/>
            </div><br>

            <div class="secBox">
                <label><?php echo $lang['product_image']; ?>:</label>
                <input type="file" id="prodImg" name="pimg"/>
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['product_type']; ?>:</label>
                <select style="height: auto" name="ptype">
                    <?php
                        while($row = $result -> fetch_array()){
                            echo "<option value=".$row['id'].">".$row['type']."</option>";
                        }
                    ?>
                </select>
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['available_stock']; ?>:</label>
                <input type="number" name="pstock">
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['delivery_option']; ?>:</label>
                <select style="height: auto" name="pdelivery">
                    <?php
                    while($row1 = $result1 -> fetch_array()){
                        echo "<option value=".$row1['id'].">".$row1['types']."</option>";
                    }
                    ?>
                </select>
            </div><br>

            <div  class="subBtn">
                <input type="submit" name="submit" value="<?php echo $lang['add']; ?>"/>
            </div>

        </form><br><br><br>
    </section>
</div>
<?php include '../vendors/footer.php'?>