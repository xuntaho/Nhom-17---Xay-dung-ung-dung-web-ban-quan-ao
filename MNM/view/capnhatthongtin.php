<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Cập nhật thông tin</title>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.container {
    width: 40%;
    background: #d1cac3;
    margin:100px auto;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    font-family: 'Istok Web';
}
.container h1 {
    text-align: center;
    color: #5b3920;
}
.input-box { margin-bottom: 18px; }
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

.error {
    color: #b00020;
    font-size: 14px;
    margin-top: 5px;
}

.input-box input.error-input {
    border: 2px solid #b00020;
    background-color: #fff5f5;
}
.input-box input.success-input {
    border: 2px solid #2e7d32;
    background-color: #f1fff3;
}

.btn-save {
    width: 100%;
    padding: 12px;
    background: #413324;
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 20px;
    cursor: pointer;
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
        <?php include "timkiem.php"; ?>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>
<div class="container">
    <h1>Thông tin tài khoản</h1>

    <form id="updateForm">

        <div class="input-box">
            <label>Tên đăng nhập</label>
            <input type="text" id="username">
            <p class="error" id="err-username"></p>
        </div>

        <div class="input-box">
            <label>Số điện thoại</label>
            <input type="text" id="phone">
            <p class="error" id="err-phone"></p>
        </div>

        <div class="input-box">
            <label>Địa chỉ</label>
            <input type="text" id="address">
            <p class="error" id="err-address"></p>
        </div>

        <button type="submit" class="btn-save">Lưu thay đổi</button>
    </form>
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
document.getElementById("updateForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const username = document.getElementById("username");
    const phone    = document.getElementById("phone");
    const address  = document.getElementById("address");

    const errUser  = document.getElementById("err-username");
    const errPhone = document.getElementById("err-phone");
    const errAddr  = document.getElementById("err-address");

    const regexPhone = /^[0-9]{10,11}$/;

    // reset
    [username, phone, address].forEach(i =>
        i.classList.remove("error-input", "success-input")
    );
    errUser.innerText = "";
    errPhone.innerText = "";
    errAddr.innerText = "";

    let valid = true;

    if (username.value.trim() === "") {
        errUser.innerText = "Tên đăng nhập không được để trống";
        username.classList.add("error-input");
        valid = false;
    } else {
        username.classList.add("success-input");
    }

    if (!regexPhone.test(phone.value.trim())) {
        errPhone.innerText = "Số điện thoại phải gồm 10–11 số";
        phone.classList.add("error-input");
        valid = false;
    } else {
        phone.classList.add("success-input");
    }

    if (address.value.trim() === "") {
        errAddr.innerText = "Vui lòng nhập địa chỉ";
        address.classList.add("error-input");
        valid = false;
    } else {
        address.classList.add("success-input");
    }

    if (valid) {
        alert("Dữ liệu hợp lệ (frontend)");
    }
});
</script>

</body>
</html>
