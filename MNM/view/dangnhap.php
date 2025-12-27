<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập - MIUSA</title>
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
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>
<div class="login-wrap">
    <div class="login-container">
        <h2 class="title">Đăng nhập</h2>

        <p id="msg" style="color:red; display:none;">Sai tên đăng nhập hoặc mật khẩu!</p>

        <form class="login-form" onsubmit="return handleLogin(event)">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit" class="btn-login">Đăng nhập</button>

            <p class="signup">Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
        </form>
    </div>
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
function handleLogin(e) {
    e.preventDefault();

    let user = document.getElementById("username").value.trim();
    let pass = document.getElementById("password").value.trim();

    if (user === "" || pass === "") {
        document.getElementById("msg").innerText = "Vui lòng nhập đầy đủ thông tin!";
        document.getElementById("msg").style.display = "block";
        return false;
    }
    document.getElementById("msg").style.display = "block";
    return false;
}
</script>

</body>
</html>
