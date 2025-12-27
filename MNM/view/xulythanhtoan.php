<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Đặt hàng thành công - MIUSA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.success-wrapper {
    margin-top: 180px;
    display: flex;
    justify-content: center;
    margin-bottom: 180px;
}

.success-box {
    width: 50%;
    background: #f5eee9;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    text-align: center;
}

.success-box h1 {
    font-size: 42px;
    color: #5b3920;
    margin-bottom: 10px;
}

.success-box p {
    font-size: 20px;
    color: #4a3b2f;
    margin: 6px 0;
}

.btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 28px;
    background: #5b3920;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-size: 20px;
}

.btn:hover {
    background: #7b573b;
}
</style>
</head>

<body class="body">

<!-- HEADER ĐỒNG BỘ -->
<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        <div class="search-box">
            <input type="text" class="search" placeholder="Tìm sản phẩm...">
            <i class="fa fa-search search-icon"></i>
        </div>
        <?php include "timkiem.php"; ?>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsu.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<!-- SUCCESS -->
<div class="success-wrapper">
    <div class="success-box">
        <div style="font-size:70px;color:#5b3920;">✔</div>
        <h1>Đặt hàng thành công!</h1>
        <p>Cảm ơn bạn đã mua hàng tại <b>MIUSA</b></p>

        <p>Phương thức thanh toán: <b>Chuyển khoản</b></p>
        <p>Ngân hàng: <b>Vietcombank</b></p>
        <p>Số tài khoản: <b>0123456789</b></p>

        <a href="index.php" class="btn">Về trang chủ</a>
        <a href="#" class="btn" style="background:#7b573b;">
            Xem đơn hàng
        </a>
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
