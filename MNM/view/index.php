<?php
session_start();
include "config/database.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MIUSA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
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

<div class="banner">
  <img src="../images/z7280374913426_f2722e5f205dd34472c815d6aecf61f6.jpg" alt="banner">
</div>

<div class="content">
    <div class="product-container" id="products">
      <?php
      $key = $_GET['search'] ?? '';

      if ($key !== '') {
          $key = mysqli_real_escape_string($conn, $key);
          $sql = "SELECT * FROM san_pham WHERE ten_san_pham LIKE '%$key%'";
          $result = mysqli_query($conn, $sql);
      } else {
          $sql = "SELECT * FROM san_pham ORDER BY id_san_pham ASC";
          $result = mysqli_query($conn, $sql);
      }

      while ($row = mysqli_fetch_assoc($result)) {
      ?>

          <div class="product-card">
            <a href="chitiet.php?id=<?php echo $row['id_san_pham']; ?>">
            <img src="../images/<?php echo $row['hinh_anh']; ?>" alt="<?php echo $row['ten_san_pham']; ?>">
            <?php echo $row['ten_san_pham']; ?>
            <p class="price"><?php echo number_format($row['gia'], 0, ',', '.'); ?>đ</p>
            </a>
          </div>

      <?php } ?>

    </div>
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
            <img src="../images/fb.png" class="anh">
        </a>
      </li>
      <li><img src="../images/instagram.png" class="anh"></li>
    </ul>
</footer>
</body>
</html>
