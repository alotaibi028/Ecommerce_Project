<?php include '../includes/config.php';
include "header.php";

if(@$_GET['action']=='update'){
	$pid = $_GET['id'];
	$query = mysqli_query($con,"select * from `products` WHERE id = '".$pid."'");
	$row2 = $query -> fetch_array();
	$stockid = $row2['stock_id'];
	$query2 = mysqli_query($con,"select * from `stock` WHERE id = '".$stockid."'");
	$row3 = $query2 -> fetch_array();
}
$query = "select * from producttypes";
$result = mysqli_query($con,$query);
$query1 = "select * from deliverytypes";
$result1 = mysqli_query($con,$query1);


if(isset($_REQUEST['submit'])){

    $vendorId = $_SESSION['u_id'];
    $pName = $_REQUEST['pname'];
    $pNameAr = $_REQUEST['pname_ar'];
    $pDesc = $_REQUEST['pdesc'];
    $pDescAr = $_REQUEST['pdesc_ar'];
    $pPrice = $_REQUEST['pprice'];
    
    $pTypeId = $_REQUEST['ptype'];
    $pStock = $_REQUEST['pstock'];
    


    $file_name=$_FILES['pimg']['name'];

		if($file_name!=''){
    $targetDir = "../assets/uploads";

    $tmp_file_at_server = $_FILES['pimg']['tmp_name'];
    $file_extension = substr($file_name, strlen($file_name) - 3, 3);
		
		
 if($file_extension != 'jpg' && $file_extension != 'png' && $file_extension != 'jpeg' &&
        $file_extension != 'JPG' && $file_extension != 'PNG' && $file_extension != 'JPEG'){
        echo '<script>alert("Error uploading file");</script>';
    }else {
    mysqli_query($con,"set names 'utf8'");
   
		$query2 = "UPDATE `stock` SET `quantity`='$pStock' WHERE id = '$stockid'";

		
        if (mysqli_query($con, $query2)) {
            $stock_id = $con->insert_id;
		if($file_name!=''){
            if (is_uploaded_file($tmp_file_at_server)) {
                move_uploaded_file($tmp_file_at_server,
                    $targetDir . '/' . $pName . '_' . $stock_id . '.' . $file_extension);
            }
		
            $pImg = $pName . '_' . $stock_id . '.' . $file_extension;
					mysqli_query($con,"UPDATE `products` SET `image`='$pImg' WHERE id = '$pid'");

		}
		
			
			$query3 = "UPDATE `products` SET `name`='$pName',`name_ar`='$pNameAr',`description`='$pDesc',`description_ar`='$pDescAr',`price`='$pPrice',`product_type_id`='$pTypeId' WHERE id = '$pid'";
		
			
            if (mysqli_query($con, $query3)) {
				
				echo '<script>alert("Successfully Updated");
				window.location.href="view_products.php"</script>';
            }
		} else {
			
            echo '<script>alert("Error updating products");</script>';
        }
		
	}}
	else{
		mysqli_query($con,"UPDATE `stock` SET `quantity`='$pStock' WHERE id = '$stockid'");

		
			$query3 = "UPDATE `products` SET `name`='$pName',`name_ar`='$pNameAr',`description`='$pDesc',`description_ar`='$pDescAr',`price`='$pPrice',`product_type_id`='$pTypeId' WHERE id = '$pid'";
			
            if (mysqli_query($con, $query3)) {
				
                echo '<script>alert("Successfully Updated");
				window.location.href="view_products.php"</script>';
            }
		else {
			
            echo '<script>alert("Error updating products");</script>';
        }
		}
	
}


?>

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
        <h2><?php echo $lang['update_products']; ?></h2><br>
        <form method="post" id="addForm" action="#" enctype="multipart/form-data">

            <div class="secBox">
                <label style="margin-right: 0% !important;"><?php echo 'Product Name' ?>:</label>
                <input type="text" id="name" value="<?php echo $row2['name'] ?>" name="pname" dir="ltr" placeholder="<?php echo 'Enter Product Name'; ?>"/>
            </div><br>
            <div class="secBox">
                <label style="margin-right: 0% !important;"><?php echo 'اسم المنتج' ?>:</label>
                <input type="text" id="name" dir="rtl" value="<?php echo $row2['name_ar'] ?>" name="pname_ar" placeholder="<?php echo 'أدخل اسم المنتج'; ?>"/>
            </div>
            <br>

            <div class="secBox">
                <label   style="margin-right: 0% !important;"><?php echo 'Description'; ?>:</label>
                <textarea id="desc" name="pdesc" dir="ltr" placeholder="<?php echo 'Enter Product Description'; ?>"><?php echo $row2['description'] ?></textarea>
            </div><br>
            <div class="secBox">
                <label   style="margin-right: 0% !important;"><?php echo 'وصف'; ?>:</label>
                <textarea id="desc" name="pdesc_ar" dir="rtl" placeholder="<?php echo 'أدخل وصف المنتج'; ?>"><?php echo $row2['description_ar'] ?></textarea>
            </div><br>

            <div class="secBox">
                    <label ><?php echo $lang['price']; ?> (Saudi Riyal)</label>
                    <input type="number" name="pprice" value="<?php echo $row2['price'] ?>" id="price" min="1" placeholder="<?php echo $lang['enter_product_price']; ?>"/>
            </div><br>
            

            <div class="secBox">
                <label><?php echo $lang['product_image']; ?>:</label>
                <input type="file" id="prodImg" name="pimg"/>
                <a href="../assets/uploads/<?php echo $row2['image'] ?>" target="_blank">(view)</a>
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['product_type']; ?>:</label>
                <select style="height: auto" name="ptype">
                    <?php
                        while($row = $result -> fetch_array()){
							?>
                            <option value="<?php echo $row['id'];?>" <?php if($row['id']==$row2['product_type_id']){echo "selected";}?> ><?php echo $row['type'] ?></option>;
                        <?php
                        }
                    ?>
                </select>
            </div><br>

            <div  class="secBox">
                <label><?php echo $lang['available_stock']; ?>:</label>
                <input type="number" name="pstock" min="1" value="<?php echo $row3['quantity'] ?>">
            </div><br>

            

            <div  class="subBtn">
                <input type="submit" name="submit" value="<?php echo $lang['update']; ?>"/>
            </div>

        </form><br><br><br>
    </section>
</div>
<?php include '../vendors/footer.php'?>