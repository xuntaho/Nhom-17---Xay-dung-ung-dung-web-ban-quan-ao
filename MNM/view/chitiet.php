<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MIUSA - Chi tiết sản phẩm</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/css.css">
</head>

<body class="body">

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
        <a href="#">Lịch sử đơn hàng</a>
        <a href="#">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<!-- CHI TIẾT SẢN PHẨM -->
<div class="detail-container">

    <div class="detail-left">
        <img src="../images/sweeter.jpeg" alt="Sản phẩm">
    </div>

    <div class="detail-right">
        <h1>Áo Sweater MIUSA</h1>

        <div class="detail-price">120.000đ</div>

        <p class="detail-desc">
            Áo sweater nữ MIUSA chất liệu cotton dày dặn, mềm mại. 
            Form unisex trẻ trung, dễ phối đồ.
        </p>

        <label><b>Chọn size:</b></label><br>
        <select class="select-size">
            <option value="">-- Chọn size --</option>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            <option>XL</option>
        </select>

        <br><br>

        <label><b>Số lượng:</b></label><br>
        <input type="number" class="quantity" value="1" min="1">

        <br><br>

        <!-- CHUYỂN HƯỚNG GIẢ LẬP -->
        <button class="btn-add" onclick="window.location.href='giohang.php'">
            Thêm vào giỏ
        </button>

        <br><br>

        <a href="index.php" class="back-link">← Quay lại cửa hàng</a>
    </div>
</div>


<!-- FOOTER -->
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
    </ul>

    <ul class="info">
      <h4>THÔNG TIN LIÊN HỆ</h4>
      <li><i class="fa fa-phone"></i> 0909090909</li>
      <li><i class="fa fa-location-arrow"></i> 180 Cao Lỗ, Quận 8, TPHCM</li>
    </ul>

    <ul class="info">
      <h4>FANPAGE</h4>
      <li><img src="../images/fb.png" class="anh"></li>
      <li><img src="../images/instagram.png" class="anh"></li>
    </ul>
</footer>

</body>
</html>
