<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giỏ hàng</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.cart-container {
    width: 80%;
    margin: 170px auto 50px;
}
.cart-title {
    font-size: 32px;
    font-weight: bold;
    color: #5b3920;
    margin-bottom: 25px;
}
.cart-item {
    display: flex;
    background: #d1cac3;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 22px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.cart-item img {
    width: 150px;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
}
.cart-info {
    flex: 1;
    padding-left: 20px;
}
.cart-info h3 {
    font-size: 26px;
    font-weight: bold;
    color: #5b3920;
}
.cart-info select,
.cart-info input {
    padding: 7px 10px;
    border-radius: 8px;
    border: 2px solid #d1cac3;
    font-size: 16px;
}
.btn-update {
    margin-top: 10px;
    padding: 8px 22px;
    background: #5b3920;
    color: white;
    border-radius: 8px;
    border: none;
}
.btn-remove {
    display: inline-block;
    margin-top: 10px;
    color: red;
    font-weight: bold;
    text-decoration: none;
}
.cart-total {
    text-align: right;
    font-size: 24px;
    margin-top: 30px;
    font-weight: bold;
    color: #5b3920;
}
.btn-pay {
    display: block;
    width: 260px;
    margin-left: auto;
    padding: 14px;
    background:#5b3920;
    color:white;
    border-radius:12px;
    text-align:center;
    font-size:20px;
    text-decoration:none;
}
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
        <a href=""><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="">Lịch sử đơn hàng</a>
        <a href="">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<div class="cart-container">

<h2 class="cart-title">Giỏ hàng của bạn</h2>

<!-- ITEM 1 -->
<div class="cart-item">
    <img src="../images/ao419.jpg">
    <div class="cart-info">
        <h3>419 BOXY TEE</h3>

        <form>
            <p>Size:
                <select>
                    <option>S</option>
                    <option selected>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
            </p>
            <p>Số lượng:
                <input type="number" value="2" min="1">
            </p>
            <button class="btn-update" type="button">Cập nhật</button>
        </form>

        <p>Giá: <b>350.000đ</b></p>
        <p>Thành tiền: <b>700.000đ</b></p>

        <a href="#" class="btn-remove">Xóa</a>
    </div>
</div>

<!-- ITEM 2 -->
<div class="cart-item">
    <img src="../images/ryokotee.jpg">
    <div class="cart-info">
        <h3>RYOKO TEE</h3>

        <form>
            <p>Size:
                <select>
                    <option selected>S</option>
                    <option>M</option>
                    <option>L</option>
                </select>
            </p>
            <p>Số lượng:
                <input type="number" value="1" min="1">
            </p>
            <button class="btn-update" type="button">Cập nhật</button>
        </form>

        <p>Giá: <b>300.000đ</b></p>
        <p>Thành tiền: <b>300.000đ</b></p>

        <a href="#" class="btn-remove">Xóa</a>
    </div>
</div>

<div class="cart-total">Tổng cộng: 1.000.000đ</div>

<a href="#" class="btn-pay">Đi đến thanh toán</a>

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
