<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>419 BOXY TEE - MIUSA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.detail-container {
    width: 70%;
    margin: 200px auto 80px;
    display: flex;
    gap: 50px;
}

.detail-left img {
    width: 380px;
    height: 480px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.detail-right h1 {
    font-size: 32px;
    color: #5b3920;
    font-family: 'Josefin Sans';
}

.detail-price {
    font-size: 22px;
    color: #a4743f;
    margin: 8px 0;
    font-weight: bold;
}

.detail-desc {
    font-size: 18px;
    color: #4d3c2e;
    margin-top: 10px;
}

.detail-right select,
.detail-right input[type=number] {
    padding: 10px 14px;
    font-size: 17px;
    border-radius: 10px;
    border: 2px solid #c1b8b0;
    margin-top: 8px;
}

.btn-add {
    margin-top: 20px;
    background: #5b3920;
    color: #fff;
    padding: 14px 40px;
    border-radius: 12px;
    border: none;
    font-size: 20px;
    cursor: pointer;
}
.btn-add:hover { background: #7b573b; }

.err-size {
    color: red;
    font-size: 16px;
    margin-top: 5px;
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
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsu.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>
        <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
    </nav>
</header>

<!-- CHI TIẾT SẢN PHẨM -->
<div class="detail-container">

    <div class="detail-left">
        <img src="../images/ao419.jpg" alt="419 BOXY TEE">
    </div>

    <div class="detail-right">
        <h1>419 BOXY TEE</h1>
        <div class="detail-price">350.000đ</div>

        <p class="detail-desc">
            419 BOXY TEE – form boxy rộng rãi, chất cotton dày dặn,
            phù hợp mặc hằng ngày và phối streetwear.
        </p>

        <form onsubmit="return kiemTra();">
            <label style="font-weight:bold;">Chọn size:</label><br>
            <select id="size">
                <option value="">-- Chọn size --</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>

            <p id="err_size" class="err-size"></p>

            <label style="font-weight:bold;">Số lượng:</label><br>
            <input type="number" value="1" min="1">

            <br><br>
            <button class="btn-add" type="submit">Thêm vào giỏ</button>
        </form>

        <br>
        <a href="index.html" style="font-size:18px;color:#5b3920;text-decoration:none;">
            ← Quay lại cửa hàng
        </a>
    </div>
</div>

<!-- FOOTER -->
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
function kiemTra() {
    const size = document.getElementById("size").value;
    const err = document.getElementById("err_size");
    err.innerHTML = "";
    if (size === "") {
        err.innerHTML = "Vui lòng chọn size!";
        return false;
    }
    alert("Demo frontend: đã thêm vào giỏ hàng!");
    return false;
}
</script>

</body>
</html>
