<?php
session_start();
include "../config/database.php";

$thong_bao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ten = mysqli_real_escape_string($conn, $_POST['username']);
    $mk  = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM nguoi_dung
            WHERE ten_dang_nhap = '$ten'
              AND mat_khau = '$mk'";

    $rs = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rs) == 1) {

        $user = mysqli_fetch_assoc($rs);

        $_SESSION['id_nguoi_dung'] = $user['id_nguoi_dung'];
        $_SESSION['ten_dang_nhap'] = $user['ten_dang_nhap'];

        header("Location: index.php");
        exit;

    } else {
        $thong_bao = "Sai tên đăng nhập hoặc mật khẩu";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập MIUSA</title>
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

 <div class="login">
    <div class="login-container">
      <h2 class="title">Đăng nhập</h2>

      <?php if ($thong_bao != "") echo "<p style='color:red;'>$thong_bao</p>"; ?>

      <form class="login-form" method="post" action="dangnhap.php">
        <label>Tên đăng nhập</label>
        <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

        <label>Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

        <button type="submit" class="btn-login">Đăng nhập</button>

        <p class="dangky">Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
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
