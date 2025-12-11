<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MIUSA - Frontend</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/css.css">
</head>

<body class="body">

<header class="header">
    <div class="logo">MIU<span>SA</span></div>

    <nav class="menu">
        <div class="search-box">
            <input type="text" class="search" placeholder="Tìm sản phẩm...">
            <i class="fa fa-search search-icon"></i>
        </div>

        <!-- Sửa lỗi link -->
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>

        <a href="#">Lịch sử đơn hàng</a>
        <a href="#">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<div class="banner">
  <img src="../images/z7280374913426_f2722e5f205dd34472c815d6aecf61f6.jpg" alt="banner">
</div>

<div class="content">
    <div class="product-container" id="products">

        <div class="product-card">
            <a href="chitiet.php?id=1">
                <img src="../images/sweeter.jpeg">
                Áo sweater MIUSA
                <p class="price">120.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=2">
                <img src="../images/hoodie.jpg">
                Hoodie MIUSA
                <p class="price">120.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=3">
                <img src="../images/hoodiezip.jpg">
                Hoodie Zip MIUSA
                <p class="price">120.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=4">
                <img src="../images/quankaki.jpg">
                Quần kaki MIUSA
                <p class="price">120.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=5">
                <img src="../images/quangrey.jpg">
                Quần xám MIUSA
                <p class="price">120.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=6">
                <img src="../images/vay.png">
                Váy MIUSA
                <p class="price">120.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=7">
                <img src="../images/ryokotee.jpg">
                Áo thun RYOKO
                <p class="price">250.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=8">
                <img src="../images/quancagro.jpg">
                Quần caro MIUSA
                <p class="price">99.000đ</p>
            </a>
        </div>

        <div class="product-card">
            <a href="chitiet.php?id=9">
                <img src="../images/quan.jpg">
                Quần dài MIUSA
                <p class="price">350.000đ</p>
            </a>
        </div>

    </div>
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
