<div class="wrapper">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="logo"><a href="index.php"><img src="images/logofeg.avif" alt="FlatShop"></a></div>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="header_top">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="usermenu">
                                    <!-- CODE CHECK ĐĂNG NHẬP -->
                                    <!-- <li><a href="login.php" class="log">Đăng nhập</a></li>
                                    <li><a href="register.php" class="reg">Đăng ký</a></li> -->
                                    <?php
                                    session_start();
                                    if (!isset($_SESSION['user'])) {
                                    ?>
                                        <a href="login.php">
                                            <p><strong>ĐĂNG NHẬP / ĐĂNG KÍ</strong></p>
                                        </a>
                                    <?php } else { ?>
                                        <a href="../../asmm/tai-khoan/thong-tin-tk.php">
                                            <p><strong>Xin chào <?= $_SESSION['user']['ho_ten'] ?></strong></p>
                                        </a>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="header_bottom">
                        <ul class="option">
                            <li id="search" class="search">
                                <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Nhập sản phẩm cần tìm..." type="text" value="" name="search"></form>
                            </li>
                            <li class="option-cart">
                                <?php
                                $sll = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        extract($item);
                                        $sll += $sl;
                                    }
                                }
                                ?>
                                <a href="cart.php" class="cart-icon">Giỏ <span style="position: absolute;padding:3px 8px;background-color:#fff;border-radius:50px;left:295px;top:25px;"><?= $sll ?></span></a>
                                <!-- <ul class="option-cart-item">
                                    <li>
                                        <div class="cart-item">
                                            <div class="image"><img src="images/products/thum/products-01.png" alt=""></div>
                                            <div class="item-description">
                                                <p class="name">Lincoln chair</p>
                                                <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                            </div>
                                            <div class="right">
                                                <p class="price">$30.00</p>
                                                <a href="#" class="remove"><img src="images/remove.png" alt="remove"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart-item">
                                            <div class="image"><img src="images/products/thum/products-02.png" alt=""></div>
                                            <div class="item-description">
                                                <p class="name">Lincoln chair</p>
                                                <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                            </div>
                                            <div class="right">
                                                <p class="price">$30.00</p>
                                                <a href="#" class="remove"><img src="images/remove.png" alt="remove"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="total">Total <strong>$60.00</strong></span><button class="checkout" onClick="location.href='checkout.php'">CheckOut</button></li>
                                </ul> -->
                            </li>
                        </ul>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Trang chủ</a></li>
                                <li><a href="products.php">Sản phẩm</a></li>
                                <li><a href="contact.php">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>