<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MIUSA - About</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
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
        line-height: 1.5;
        max-width: 900px;
        font-family: 'Josefin Sans';
    }

    @media(max-width:600px){
        .about-title {
            font-size: 24px;
        }
    }
  </style>
</head>

<body class="body">

<!-- HEADER GIỐNG INDEX -->
<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        <div class="search-box">
            <input type="text" class="search" placeholder="Tìm sản phẩm...">
            <i class="fa fa-search search-icon"></i>
        </div>

        <a href="index.html"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.html"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="#">Lịch sử đơn hàng</a>
        <a href="about.html">About</a>
        <a href="#"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<!-- ABOUT CONTENT -->
<div class="about-wrapper">
    <h1 class="about-title">
        MIUSA được thành lập dựa trên sự yêu thích thời trang của giới trẻ
    </h1>
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
      <li>Chính sách kiểm hàng</li>
    </ul>

    <ul class="info">
      <h4>THÔNG TIN LIÊN HỆ</h4>
      <li><i class="fa fa-phone"></i> 0909090909</li>
      <li><i class="fa fa-location-arrow"></i> 180 Cao Lỗ, P. Chánh Hưng, TPHCM</li>
    </ul>

    <ul class="info">
      <h4>FANPAGE</h4>
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


