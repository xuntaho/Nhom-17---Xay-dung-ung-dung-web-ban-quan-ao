<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thông tin tài khoản</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.account-box {
    width: 60%;
    margin: 160px auto 160px;
    background: #d1cac3;
    padding: 35px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.account-box h3 {
    font-size: 15px;
    color: #5b3920;
    font-family: "Josefin Sans";
    margin-bottom: 25px;
}
.info-line {
    font-size: 15px;
    margin-bottom: 12px;
    color: #4d3c2e;
}
.btn {
    display: inline-block;
    margin-top: 18px;
    padding: 12px 28px;
    border-radius: 10px;
    font-size: 15px;
    background: #5b3920;
    color: white;
    text-decoration: none;
}
.btn:hover { background: #7b573b; }
.btn-logout {
    background: red;
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

<div class="account-box">
    <h2>Thông tin tài khoản</h2>

    <p class="info-line"><b>Tên đăng nhập:</b> Nguyen Van C</p>
    <p class="info-line"><b>Số điện thoại:</b> 0909090909</p>
    <p class="info-line"><b>Địa chỉ:</b> 180 Cao Lỗ, P. Chánh Hưng, TP.HCM</p><br>

    <a href="capnhatthongtin..php" class="btn">Cập nhật thông tin</a>
    <a href="doimatkhau.php" class="btn">Đổi mật khẩu</a>
    <a href="dangxuat.php" class="btn btn-logout">Đăng xuất</a>
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
