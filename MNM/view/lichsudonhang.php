<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Lịch sử đơn hàng</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">
<link rel="stylesheet" href="../style/css.css">

<style>
.page-wrapper {
    width: 80%;
    margin: 160px auto 50px;
    text-align: center;
}

.order-table {
    width: 100%;
    border-collapse: collapse;
    background: #f5eee9;
    border-radius: 15px;
    overflow: hidden;
    font-size: 20px;
}

.order-table th {
    background: #5b3920;
    color: white;
    padding: 15px;
    font-size: 22px;
}

.order-table td {
    padding: 15px;
    border-bottom: 1px solid #c8bfb8;
    color: #5b3920;
}

.order-table tr:last-child td {
    border-bottom: none;
}

.btn-back {
    margin-top: 25px;
    display: inline-block;
    padding: 15px 30px;
    background: #5b3920;
    color: white;
    border-radius: 10px;
    font-size: 22px;
    text-decoration: none;
}
.btn-back:hover { background:#7b573b; }
</style>
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
        <a href="">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<div class="page-wrapper">
    <h1 style="font-size:38px; color:#5b3920; margin-bottom:20px;">
        Lịch sử đơn hàng
    </h1>

    <table class="order-table">
        <tr>
            <th>Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>

        
        <tr>
            <td>DH001</td>
            <td>12/05/2025</td>
            <td>1.250.000đ</td>
            <td>Đã giao</td>
        </tr>

        <tr>
            <td>DH002</td>
            <td>20/05/2025</td>
            <td>890.000đ</td>
            <td>Đang giao</td>
        </tr>

        <tr>
            <td>DH003</td>
            <td>01/06/2025</td>
            <td>2.100.000đ</td>
            <td>Chờ xác nhận</td>
        </tr>
    </table>

    <a href="index.php" class="btn-back">Tiếp tục mua sắm</a>
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
