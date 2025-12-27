<?php
session_start();
include "../config/database.php";

$errors = [
    "username" => "",
    "password" => "",
    "hoten" => "",
    "sdt" => "",
    "diachi" => ""
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ten = trim($_POST['username']);
    $matkhau = trim($_POST['password']);
    $hoten = trim($_POST['hoten']);
    $sdt = trim($_POST['sdt']);
    $diachi = trim($_POST['diachi']);
    if ($ten == "") $errors["username"] = "Vui lòng nhập tên đăng nhập";

    if ($matkhau == "") $errors["password"] = "Vui lòng nhập mật khẩu";

    if ($hoten == "") $errors["hoten"] = "Vui lòng nhập họ tên";

    if ($diachi == "") $errors["diachi"] = "Vui lòng nhập địa chỉ";

    if (!array_filter($errors)) {
        $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, so_dien_thoai, dia_chi)
                VALUES ('$ten', '$matkhau', '$hoten', '$sdt', '$diachi')";

        mysqli_query($conn, $sql);

        $success = "Đăng ký thành công!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/login.css">
</head>
<body class="body">
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
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>
<div class="login-wrap">
  <div class="login-container">
    <h2 class="title">Đăng ký</h2>

    <?php if (!empty($success)) { ?>
        <p style="color: green; font-weight: bold;"><?= $success ?></p>
    <?php } ?>

    <form class="login-form" method="post" action="dangky.php">

        <label>Tên đăng nhập</label>
        <input type="text" name="username" value="<?= $ten ?? '' ?>">
        <p class="error"><?= $errors["username"] ?></p>

        <label>Mật khẩu</label>
        <input type="password" name="password">
        <p class="error"><?= $errors["password"] ?></p>

        <label>Họ tên</label>
        <input type="text" name="hoten" value="<?= $hoten ?? '' ?>">
        <p class="error"><?= $errors["hoten"] ?></p>
        
        <label>Số điện thoại</label>
        <input type="text" name="sdt" value="<?= $sdt ?? '' ?>">
        <p class="error"><?= $errors["sdt"] ?></p>

        <label>Địa chỉ</label>
        <input type="text" name="diachi" value="<?= $diachi ?? '' ?>">
        <p class="error"><?= $errors["diachi"] ?></p>

        <button type="submit" class="btn-login">Đăng ký</button>

        <p class="signup">Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
    </form>
  </div>
</div>
<footer class="footer">
    <ul class="info">
      <h4>HỘ KINH DOANH MIUSA</h4>
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
