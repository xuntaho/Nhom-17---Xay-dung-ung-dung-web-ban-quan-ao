<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/login.css">
</head>
<body>
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
<div class="login-wrap">
  <div class="login-container">
    <h2 class="title">Đăng ký</h2>
    <form class="login-form" id="registerForm">

    <label>Tên đăng nhập</label>
    <input type="text" id="username">
    <p class="error" id="err-username"></p>

    <label>Mật khẩu</label>
    <input type="password" id="password">
    <p class="error" id="err-password"></p>

    <label>Họ tên</label>
    <input type="text" id="hoten">
    <p class="error" id="err-hoten"></p>

    <label>Số điện thoại</label>
    <input type="text" id="sdt">
    <p class="error" id="err-sdt"></p>

    <label>Địa chỉ</label>
    <input type="text" id="diachi">
    <p class="error" id="err-diachi"></p>

    <button type="submit" class="btn-login">Đăng ký</button>

</form>

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
<script>
document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault(); 

    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value;
    const hoten    = document.getElementById("hoten").value.trim();
    const sdt      = document.getElementById("sdt").value.trim();
    const diachi   = document.getElementById("diachi").value.trim();

    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{6,}$/;
    const regexPhone = /^[0-9]{10,11}$/;

    document.querySelectorAll(".error").forEach(e => e.innerText = "");

    let valid = true;

    if (username === "") {
        document.getElementById("err-username").innerText = "Vui lòng nhập tên đăng nhập";
        valid = false;
    }

    if (!regexPassword.test(password)) {
        document.getElementById("err-password").innerText =
            "Mật khẩu ≥6 ký tự, gồm hoa, thường, số, ký tự đặc biệt";
        valid = false;
    }

    if (hoten === "") {
        document.getElementById("err-hoten").innerText = "Vui lòng nhập họ tên";
        valid = false;
    }

    if (!regexPhone.test(sdt)) {
        document.getElementById("err-sdt").innerText = "Số điện thoại 10–11 số";
        valid = false;
    }

    if (diachi === "") {
        document.getElementById("err-diachi").innerText = "Vui lòng nhập địa chỉ";
        valid = false;
    }

    if (valid) {
        alert("Đăng ký hợp lệ");
    }
});
</script>
</body>
</html>
