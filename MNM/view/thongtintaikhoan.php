<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['id_nguoi_dung'])) {
    header("Location: dangnhap.php");
    exit;
}

$id = $_SESSION['id_nguoi_dung'];

$sql = "SELECT * FROM nguoi_dung WHERE id_nguoi_dung = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Không tìm thấy tài khoản!");
}
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
<style>
.account-box {
    width: 60%;
    margin: 130px auto 130px;
    background: #d1cac3;
    padding: 30px;
    border-radius: 11px;
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
<body class="body">
<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i> Giỏ hàng</a>
        <a href="">Lịch sử đơn hàng</a>
        <a href="">About</a>
        <?php if (!isset($_SESSION["id_nguoi_dung"])) { ?>
          <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
          <span style="color:black ;font-size: 15px;" >
          Chào bạn <?php echo $_SESSION["ten_dang_nhap"]; ?>
          </span>
           <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a> 
        <?php } ?> 
    </nav>
</header>
<div class="account-box">
    <h2>Thông tin tài khoản</h2>

    <p class="info-line"><b>Tên đăng nhập:</b> <?= $user['ten_dang_nhap'] ?? '' ?></p>
    <p class="info-line"><b>Số điện thoại:</b> <?= $user['so_dien_thoai'] ?? 'Chưa cập nhật' ?></p>
    <p class="info-line"><b>Địa chỉ:</b> <?= $user['dia_chi'] ?? 'Chưa cập nhật' ?></p>

    <br>

    <a href="capnhatthongtin.php" class="btn">Cập nhật thông tin</a>
    <a href="doimatkhau.php" class="btn">Đổi mật khẩu</a>
    <a href="dangxuat.php" class="btn btn-logout">Đăng xuất</a>
</div>
<footer class="footer">
    <ul class="info">
      <h4 style="font-weight: bold;">HỘ KINH DOANH MIUSA </h4>
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
      <h4 style="font-weight: bold;">THÔNG TIN LIÊN HỆ</h4>
      <li><i class="fa fa-phone"></i> 0909090909</li>
      <li><i class="fa fa-location-arrow"></i> 180 Cao Lỗ, P. Chánh Hưng, TPHCM</li>
    </ul>
    <ul class="info">
      <h4 style="font-weight: bold;">FANPAGE</h4>
      <li>
        <a href="https://www.facebook.com/share/1GQMPBSu9z/?mibextid=wwXIfr" target="_blank">
            <img src="../images/fb.png" class="anh" alt="facebook">
        </a>
      </li>
      <li><img src="../images/instagram.png" class="anh" alt="instagram"></li>
    </ul>
</footer>
</body>
</html>