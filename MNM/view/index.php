<?php 
session_start();  
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MIUSA</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/css.css">
</head>

<body class="body">

<header class="header">
    <div class="logo">MIU<span>SA</span></div>

    <nav class="menu">

        <?php include "timkiem.php"; ?>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="#">Lịch sử đơn hàng</a>
        <a href="#">About</a>

        <?php if (!isset($_SESSION["id_nguoi_dung"])) { ?>
            <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
            <span style="color:black; font-size: 15px;">
                Chào bạn <?php echo $_SESSION["ten_dang_nhap"]; ?>
            </span>
            <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a>
        <?php } ?> 

    </nav>
</header>

<!-- BANNER -->
<div class="banner">
    <img src="../images/z7280374913426_f2722e5f205dd34472c815d6aecf61f6.jpg">
</div>

<!-- SẢN PHẨM -->
<div class="content">
    <div class="product-container">

        <!-- SP lấy từ backend: 419 BOXY TEE -->
        <div class="product-card">
            <a href="chitiet.php?id=1">
                <img src="../images/ao419.jpg">
                419 BOXY TEE
                <p class="price">350.000đ</p>
            </a>
        </div>

        <!-- NON STANDARD HOODIE -->
        <div class="product-card">
            <a href="chitiet.php?id=2">
                <img src="../images/hoodie.jpg">
                NON STANDARD HOODIE
                <p class="price">480.000đ</p>
            </a>
        </div>

        <!-- SICK FAME TEE -->
        <div class="product-card">
            <a href="chitiet.php?id=3">
                <img src="../images/sickfame.jpg">
                SICK FAME TEE
                <p class="price">370.000đ</p>
            </a>
        </div>

        <!-- THE GO HOODIE ZIP -->
        <div class="product-card">
            <a href="chitiet.php?id=4">
                <img src="../images/hoodiezip.jpg">
                THE GO HOODIE ZIP
                <p class="price">500.000đ</p>
            </a>
        </div>

        <!-- RYOKO TEE -->
        <div class="product-card">
            <a href="chitiet.php?id=5">
                <img src="../images/ryokotee.jpg">
                RYOKO TEE
                <p class="price">300.000đ</p>
            </a>
        </div>

        <!-- SWEATPANTS BLACK -->
        <div class="product-card">
            <a href="chitiet.php?id=6">
                <img src="../images/quanblack.jpg">
                SWEATPANTS - BLACK
                <p class="price">490.000đ</p>
            </a>
        </div>

        <!-- ARMY CARGO SHORTS -->
        <div class="product-card">
            <a href="chitiet.php?id=7">
                <img src="../images/quancagro.jpg">
                ARMY CARGO SHORTS
                <p class="price">450.000đ</p>
            </a>
        </div>

        <!-- DRAGON KHAKI PANTS -->
        <div class="product-card">
            <a href="chitiet.php?id=8">
                <img src="../images/quankaki.jpg">
                DRAGON KHAKI PANTS
                <p class="price">490.000đ</p>
            </a>
        </div>

        <!-- S-ULTIMATE SHORTS -->
        <div class="product-card">
            <a href="chitiet.php?id=9">
                <img src="../images/quan.jpg">
                S-ULTIMATE SHORTS
                <p class="price">450.000đ</p>
            </a>
        </div>

        <!-- SWEATPANTS GREY -->
        <div class="product-card">
            <a href="chitiet.php?id=10">
                <img src="../images/quangrey.jpg">
                SWEATPANTS - GREY
                <p class="price">490.000đ</p>
            </a>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <ul class="info">
        <h4 style="font-weight: bold;">HỘ KINH DOANH MIUSA</h4>
    </ul>

    <ul class="info">
        <h4 style="font-weight: bold;">LIÊN KẾT</h4>
        <li>Chính sách bảo mật</li>
        <li>Hướng dẫn mua hàng</li>
        <li>Chính sách đổi trả</li>
        <li>Hướng dẫn thanh toán</li>
        <li>Chính sách vận chuyển</li>
        <li>Chính sách kiểm hàng</li>
    </ul>

    <ul class="info">
        <h4 style="font-weight: bold;">LIÊN HỆ</h4>
        <li><i class="fa fa-phone"></i> 0909090909</li>
        <li><i class="fa fa-location-arrow"></i> 180 Cao Lỗ, P. Chánh Hưng, TPHCM</li>
    </ul>

    <ul class="info">
        <h4 style="font-weight: bold;">FANPAGE</h4>
        <li><img src="../images/fb.png" class="anh"></li>
        <li><img src="../images/instagram.png" class="anh"></li>
    </ul>
</footer>

</body>
</html>
