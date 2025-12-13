<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giới thiệu - MIUSA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/login.css">
<link rel="stylesheet" href="../style/css.css">
<style>
    .about-wrapper {
        width: 100%;
        min-height: 55vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 100px 20px 60px;
        text-align: center;
    }

    .about-title {
        font-size: 32px;
        font-weight: bold;
        color: #3a2a1f;
        font-family: 'Playfair Display', serif;
        line-height: 1.5;
        max-width: 900px;
    }

    @media(max-width:600px){
        .about-title {
            font-size: 24px;
        }
    }
  </style>
</head>

<body>

<!-- HEADER -->
<header class="header">
    <div class="logo">MIU<span>SA</span></div>

    <nav class="menu">
        <div class="search-box">
            <input type="text" class="search" placeholder="Tìm sản phẩm...">
            <i class="fa fa-search search-icon"></i>
        </div>

        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>

        <?php if (!isset($_SESSION["id_nguoi_dung"])) { ?>
            <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
            <span style="font-size:15px;">Chào <?php echo $_SESSION["ten_dang_nhap"]; ?></span>
            <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a>
        <?php } ?>
    </nav>
</header>


<div class="about-wrapper">
    <h2 class="about-title">MIUSA được thành lập dựa trên phong cách phù hợp với giới trẻ và
            người yêu thích sự tinh tế.
    </h2>
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
