<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giỏ hàng - MIUSA</title>

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

<!-- GIỎ HÀNG -->
<div class="cart-wrapper">

    <h1 class="cart-title">Giỏ hàng của bạn</h1>

    <!-- SP 1 -->
    <div class="cart-item">
        <img src="../images/sweeter.jpeg">

        <div class="cart-info">
            <h3>Áo Sweater MIUSA</h3>

            <p>Size:
                <select>
                    <option>M</option>
                    <option>S</option>
                    <option>L</option>
                </select>
            </p>

            <p>Số lượng:
                <input type="number" value="1" min="1">
            </p>

            <p>Giá: <b>120.000đ</b></p>
            <p>Thành tiền: <b>120.000đ</b></p>

            <a href="#" class="btn-remove">Xóa</a>
        </div>
    </div>

    <!-- TỔNG TIỀN -->
    <div class="cart-total">
        Tổng tiền: <b>120.000đ</b>
    </div>

    <a href="thanhtoan.php" class="btn-pay">Đi đến thanh toán</a>

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
