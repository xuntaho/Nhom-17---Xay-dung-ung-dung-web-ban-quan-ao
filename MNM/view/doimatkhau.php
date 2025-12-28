<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['id_nguoi_dung'])) {
    header("Location: dangnhap.php");
    exit;
}

$id_user = $_SESSION['id_nguoi_dung'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đổi mật khẩu</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.change-box {
    width: 45%;
    margin: 180px auto;
    background: #d1cac3;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-align: center;
}
.change-box h2 {
    font-family: 'Josefin Sans';
    color: #5b3920;
    font-size: 32px;
}
input {
    width: 90%;
    padding: 12px;
    margin: 10px 0;
    border: 2px solid #d1cac3;
    border-radius: 10px;
}
.btn-submit {
    background: #5b3920;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 10px;
    font-size: 20px;
}
.btn-submit:hover {
    background: #7b573b;
}
</style>
</head>

<body class="body">
<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        <?php include "timkiem.php"; ?>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>
        <?php if (!isset($_SESSION["id_nguoi_dung"])) { ?>
            <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
            <span style="color:black;font-size:15px;">
                Chào bạn <?php echo $_SESSION["ten_dang_nhap"]; ?>
            </span>
            <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a>
        <?php } ?>
    </nav>
</header>
<div class="change-box">
    <h2>Đổi mật khẩu</h2>
    <?php if (isset($_GET['err'])) { ?>
        <p style="color:red; font-size:18px;"><?=$_GET['err']?></p>
    <?php } ?>

    <?php if (isset($_GET['ok'])) { ?>
        <p style="color:green; font-size:18px;"><?=$_GET['ok']?></p>
    <?php } ?>

    <form action="xulydoimatkhau.php" method="post">
        <input type="password" name="mat_khau_cu" placeholder="Nhập mật khẩu cũ" required>
        <input type="password" name="mat_khau_moi" placeholder="Nhập mật khẩu mới" required>
        <input type="password" name="mat_khau_moi2" placeholder="Nhập lại mật khẩu mới" required>

        <button class="btn-submit" name="btn_doimatkhau">Đổi mật khẩu</button>
    </form>
</div>

<footer class="footer">
    <ul class="info">
      <h4>HỘ KINH DOANH MIUSA </h4>
    </ul>

    <ul class="info">
      <h4>LIÊN KẾT</h4>
      <li>Chính sách bảo mật</li>
      <li>Hướng dẫn mua hàng</li>
      <li>Chính sách đổi trả</li>
      <li>Hướng dẫn thanh toán</li>
      <li>Chính sách vận chuyển</li>
      <li>Chính sách kiểm hàng</li>
    </ul>

    <ul class="info">
      <h4>THÔNG TIN LIÊN HỆ</h4>
      <li><i class="fa fa-phone"></i> 0909090909</li>
      <li><i class="fa fa-location-arrow"></i> 180 Cao Lỗ, P. Chánh Hưng, TPHCM</li>
    </ul>

    <ul class="info">
      <h4>FANPAGE</h4>
      <li><img src="../images/fb.png" class="anh"></li>
      <li><img src="../images/instagram.png" class="anh"></li>
    </ul>
</footer>

</body>
</html>
