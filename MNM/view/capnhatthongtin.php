<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Cập nhật thông tin - MIUSA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.container {
    width: 40%;
    background: #f5eee9;
    margin: 140px auto 50px;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    font-family: 'Istok Web', sans-serif;
}

.container h1 {
    text-align: center;
    color: #5b3920;
    margin-bottom: 20px;
}

.input-box {
    margin-bottom: 18px;
}

.input-box label {
    display: block;
    font-size: 18px;
    font-weight: bold;
    color: #5b3920;
}

.input-box input {
    width: 100%;
    padding: 10px 15px;
    border-radius: 10px;
    border: 2px solid #d1cac3;
    font-size: 17px;
}

.btn-save {
    width: 100%;
    padding: 12px;
    background: #5b3920;
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 20px;
    cursor: pointer;
}
.btn-save:hover {
    background:#7b573b;
}

.thongbao {
    text-align:center;
    color: green;
    font-size: 18px;
    margin-bottom: 15px;
}
</style>
</head>

<body class="body">
<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        <input type="text" placeholder="Search..." class="search">
        <a href="index.html"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.html"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="">Lịch sử đơn hàng</a>
        <a href="">About</a>
        <span style="font-size: 15px;">Chào bạn <b>nguyenvana</b></span>
        <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a>
    </nav>
</header>
<div class="container">

    <h1>Thông tin tài khoản</h1>
    <p class="thongbao" id="msg" style="display:none;">
        Cập nhật thông tin thành công!
    </p>

    <form onsubmit="return saveInfo()">

        <div class="input-box">
            <label>Họ tên</label>
            <input type="text" id="ho_ten" value="Nguyễn Văn A" required>
        </div>

        <div class="input-box">
            <label>Số điện thoại</label>
            <input type="text" id="so_dien_thoai" value="0909090909">
        </div>

        <div class="input-box">
            <label>Địa chỉ</label>
            <input type="text" id="dia_chi" value="180 Cao Lỗ, TP.HCM">
        </div>

        <button class="btn-save">Lưu thay đổi</button>
    </form>

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
<script>
function saveInfo() {
    document.getElementById("msg").style.display = "block";
    return false;
}
</script>

</body>
</html>
