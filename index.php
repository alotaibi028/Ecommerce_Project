<?php   include 'includes/config.php';
        include 'header.php';

    $sql = "select * from `products` order by date_added desc";
    $result = mysqli_query($con, $sql);


    $queryDesert = "select * from products where product_type_id=3";
    $resultDesert = mysqli_query($con, $queryDesert);

    $queryBaked = "select * from products where product_type_id=2";
    $resultBaked = mysqli_query($con, $queryBaked);

    $queryTraditional = "select * from products where product_type_id=1";
    $resultTr = mysqli_query($con, $queryTraditional);

?>
    <section>
        <div class="container1">
            <div class="row">
                <div>
                    <div class="supermartket-owl-carousel banner1" data-number="1" data-margin="0" data-navcontrol="yes">
                        <div class="item-slide">
                            <img src="assets/images/slides/tard.jpg" alt="banner-img">
                            <div class="item-slide-content item-slide-content3 slide1">
                                <h4 class="sile-subtitle"></h4>
                                <h2 class="slide-title"></h2>
                                <a class="button1" href="#"><?php echo $lang['buy_now']; ?></a>
                            </div>
                        </div>
                        <div class="item-slide">
                            <img src="assets/images/slides/trad3.jpg" alt="banner-img">
                            <div class="item-slide-content item-slide-content3 slide2">
                                <h2 class="slide-title"></h2>
                                <h4 class="sile-subtitle"></h4>
                                <a class="button1" href="#"><?php echo $lang['buy_now']; ?></a>
                            </div>
                        </div>
                        <div class="item-slide">
                            <img src="assets/images/slides/tard11.jpg" alt="banner-img">
                            <div class="item-slide-content item-slide-content3 slide3">
                                <h3 class="slide-title"></span></h3>
                                <a class="button1" href="#"><?php echo $lang['buy_now']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sicon">
        <div class="container2">
            <div class="row" id="ricon">
                <div class="icons">
                        <div class="icon-box sty">
                            <div class="icon-box-left"><i class="flaticon-transport"></i></div>
                            <div class="icon-box-right">
                                <h4><a href="#" data-color="#3374a6"><?php echo $lang['free_fast_Delivery']; ?></a></h4>
                                <p>On hundreds of Food items<br/>Excludes Sunday delivery</p>
                            </div>
                        </div>
                    </div>
                <div class="icons">
                        <div class="icon-box sty">
                            <div class="icon-box-left"><i class="flaticon-shield"></i></div>
                            <div class="icon-box-right">
                                <h4><a href="#" data-color="#3374a6"><?php echo $lang['buyer_protection']; ?></a></h4>
                                <p>On hundreds of Food items<br/>Excludes Sunday delivery</p>
                            </div>
                        </div>
                    </div>
                <div class="icons">
                        <div class="icon-box sty">
                            <div class="icon-box-left"><i class="flaticon-dollar-symbol"></i></div>
                            <div class="icon-box-right">
                                <h4><a href="#" data-color="#3374a6"><?php echo $lang['return_exchange']; ?></a></h4>
                                <p>On hundreds of Food items<br/>Excludes Sunday delivery</p>
                            </div>
                        </div>
                    </div>
                <div class="icons">
                        <div class="icon-box sty">
                            <div class="icon-box-left"><i class="flaticon-24-hours-support"></i></div>
                            <div class="icon-box-right">
                                <h4><a href="#" data-color="#3374a6"><?php echo $lang['support']; ?></a></h4>
                                <p>On hundreds of Food items<br/>Excludes Sunday delivery</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="product-tabs">
                <h4 class="tab-title"><?php echo $lang['food_item']; ?></h4>
                <ul  class="nav nav-pills">
                    <li class="active"><a  href="#" data-toggle="tab"><?php echo $lang['new_arrival']; ?></a></li>
                    <li><a href="#" data-toggle="tab"><?php echo $lang['sale_product']; ?></a></li>
                </ul>
                <div class="product-tabs-content tab-content clearfix equal-container">
                    <div class="tab-pane active" id="tab1">
                        <div class="supermartket-owl-carousel" data-number="5" data-margin="0" >
						<?php 
                        if(mysqli_num_rows($result) > 0) {
							while($row = $result -> fetch_array()){
								$query2 = "select * from deliverytypes where id = " . $row['delivery_type_id'];
								$result3 = mysqli_query($con, $query2);
								$row2 = $result3->fetch_array();
								?>
								<div class="product-list-content equal-elem">
										<div class="product-media">
											<figure>
												<a href='product_detail.php?prodId=<?php echo $row['id']; ?>'><img src="assets/uploads/<?php echo $row['image']; ?>"
																 alt="feature" width="202" height="239">
												</a>
											</figure>
										</div>
										<a href="product_detail.php?prodId=<?php echo $row['id']; ?>" class="feature-slide-name" style="font-size: 15px;"><?php echo $row['name']; ?>
										<span style="font-size: 12px;">(<?php echo $lang['delivery']; ?>: <?php echo $row2['types']; ?>)</span></a>
										<div class="feature-slide-cost">
											<span class="price"><?php echo $lang['price']; ?>: <?php echo $row['price']; ?></span>
										</div>
								   
								</div>
								 <?php }
								}else{
									echo '<br><br><h2 style="margin: 20px 0px;">'.$lang['no_product'].'</h2><br><br>';
                            }	
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="supermartket-owl-carousel" data-number="5" data-margin="0" >
							<?php 
                            if(mysqli_num_rows($resultTr) > 0) {
								while($row = $result -> fetch_array()){ ?>
									<div class="product-list-content equal-elem">
										<div class="product-media">
											<figure>
												<a href='product_detail.php?prodId=<?php echo $row['id']; ?>'><img src="assets/uploads/<?php echo $row['image']; ?>"
																 alt="feature" width="202" height="239">
												</a>
											</figure>
										</div>
										<a href="product_detail.php?prodId=<?php echo $row['id']; ?>" class="feature-slide-name" style="font-size: 15px;"><?php echo $row['name']; ?>
										<span style="font-size: 12px;">(<?php echo $lang['delivery']; ?>: Available)</span></a>
										<div class="feature-slide-cost">
											<span class="price"><?php echo $lang['price']; ?>: <?php echo $row['price']; ?></span>
										</div>
									</div>
								 <?php }
								}else{
									echo '<br><br><h2 style="margin: 20px 0px;">'.$lang['no_product'].'</h2><br><br>';
                            }
                            ?>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div>
                    <div>
                        <figure>
                            <a href=""><img alt="" style="padding: 20px 0px" src="assets/images/slides/tard1.jpg"></a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="product-tabs">
                <h4 class="tab-title"><?php echo $lang['food_category']; ?></h4>
                <ul  class="nav nav-pills">
                    <li class="active"><a  href="#" data-toggle="tab"><?php echo $lang['dessert']; ?></a></li>
                    <li><a href="#" data-toggle="tab"><?php echo $lang['baked']; ?></a></li>
                    <li><a href="#" data-toggle="tab"><?php echo $lang['tr_food']; ?></a></li>
                </ul>
                <div class="product-tabs-content tab-content clearfix equal-container">
                    <div class="tab-pane active" id="tab3">
                        <div class="supermartket-owl-carousel" data-number="5" data-margin="0" >
                            <?php
                                if(mysqli_num_rows($resultDesert) > 0) {
                                    while ($rowDesert = $resultDesert->fetch_array()) {
                                        $queryD = "select * from deliverytypes where id = " . $rowDesert['delivery_type_id'];
                                        $resultD = mysqli_query($con, $queryD);
                                        $rowD = $resultD->fetch_array();
                                        ?>
                                        <div class="product-list-content equal-elem">
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
                                                <span style="font-size: 12px;">
												(<?php echo $lang['delivery']; ?>: <?php echo $rowD['types']; ?>)</span></a>
                                            <div class="feature-slide-cost">
                                                <span class="price"><?php echo $lang['price']; ?>: <?php echo $rowDesert['price']; ?></span>
                                            </div>
                                        </div>
                                    <?php }
                                }else{
                                    echo '<br><br><h2 style="margin: 20px 0px;">'.$lang['no_product'].'</h2><br><br>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <div class="supermartket-owl-carousel" data-number="5" data-margin="0">
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
                                echo '<h2 style="margin: 20px 0px;">'.$lang['no_product'].'</h2>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <div class="supermartket-owl-carousel" data-number="5" data-margin="0">
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
                                echo '<br><br><h2 style="margin: 20px 0px;">'.$lang['no_product'].'</h2><br><br>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div>
                    <div class="row">
                        <div>
                            <div>
                                <figure>
                                    <a href="#">
                                        <img alt="" style="padding: 20px 0px"  src="assets/images/slides/Dessert1.jpg">
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php	include("footer.php"); ?>
