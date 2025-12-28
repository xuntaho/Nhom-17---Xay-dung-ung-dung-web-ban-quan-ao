<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['id_nguoi_dung'])) {
    header("Location: dangnhap.php");
    exit;
}

if (empty($_SESSION['gio_hang'])) {
    header("Location: giohang.php");
    exit;
}

$tong_tien = 0;

foreach ($_SESSION['gio_hang'] as $item) {
    $id_sp = $item['id_san_pham'];
    $qty   = $item['so_luong'];

    $rs = mysqli_query($conn, "SELECT gia FROM san_pham WHERE id_san_pham = $id_sp");
    $sp = mysqli_fetch_assoc($rs);

    $tong_tien += $sp['gia'] * $qty;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thanh toán - MIUSA</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style/css.css">

<style>
.body { background:#d1cac3; }

.checkout-box {
    width: 40%;
    margin: 180px auto 80px;
    background: #d1cac3;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}

.checkout-box h2 {
    text-align:center;
    font-size:22px;
    color:#5b3920;
    font-family:'Josefin Sans';
    margin-bottom:25px;
}

.checkout-box label {
    font-size:15px;
    font-weight:bold;
    color:#5b3920;
}

.checkout-box input,
.checkout-box select,
.checkout-box textarea {
    width:100%;
    padding:13px;
    font-size:18px;
    margin-top:8px;
    margin-bottom:18px;
    border-radius:12px;
    border:2px solid #d1cac3;
}

.checkout-box textarea {
    height:100px;
}

.total-demo {
    font-size:20px;
    font-weight:bold;
    color:#5b3920;
    text-align:right;
    margin-bottom:15px;
}

.btn-submit {
    background:#5b3920;
    color:white;
    width:100%;
    padding:15px;
    border:none;
    border-radius:12px;
    font-size:20px;
    cursor:pointer;
}
.btn-submit:hover { background:#7b573b; }

#bank_box {
    background:#d1cac3;
    padding:20px;
    font-size: 15px;
    border-radius:12px;
    margin-top:12px;
    display:none;
}
</style>
</head>

<body class="body">
<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        <?php include "timkiem.php"; ?>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
        <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
        <a href="about.php">About</a>
        <?php if (!isset($_SESSION["id_nguoi_dung"])) { ?>
            <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
            <span style="color:black;font-size:15px;">
                Chào bạn <?php echo $_SESSION["ten_dang_nhap"]; ?>
            </span>
            <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a>
        <?php } ?>
    </nav>
</header>

<div class="checkout-box">

<h2>Thông tin thanh toán</h2>

<div class="total-demo">Tổng tiền: 1.000.000đ</div>

<form method="post" action="xulythanhtoan.php" onsubmit="return checkPay();">

    <label>Họ tên</label>
    <input type="text" placeholder="Nhập họ tên" name="ho_ten" required>

    <label>Số điện thoại</label>
    <input type="text" placeholder="Nhập số điện thoại" name="so_dien_thoai" required>

    <label>Địa chỉ nhận hàng</label>
    <input type="text" placeholder="Nhập địa chỉ" name="dia_chi" required>

    <label>Phương thức thanh toán</label>
    <select id="phuong_thuc" onchange="toggleBank();" name="phuong_thuc" required>
        <option value="">-- Chọn phương thức --</option>
        <option value="COD">Thanh toán khi nhận hàng (COD)</option>
        <option value="Bank">Chuyển khoản</option>
    </select>

    <div id="bank_box">
        <label>Ngân hàng</label>
        <select name="ten_ngan_hang" id="ten_ngan_hang">
            <option value="">-- Chọn ngân hàng --</option>
            <option>Vietcombank</option>
            <option>MB Bank</option>
            <option>Techcombank</option>
            <option>ACB</option>
        </select>

        <label>Số tài khoản</label>
        <input type="text" name="so_tai_khoan" id="so_tai_khoan" placeholder="Nhập số tài khoản">
    </div>

    <label>Ghi chú</label>
    <textarea name="ghi_chu" placeholder="Ghi chú thêm cho đơn hàng..."></textarea>
    <button type="submit" class="btn-submit">
        Xác nhận đặt hàng
    </button>

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
      <li>
        <a href="https://www.facebook.com/share/1GQMPBSu9z/?mibextid=wwXIfr" target="_blank">
            <img src="../images/fb.png" class="anh">
        </a>
      </li>
      <li><img src="../images/instagram.png" class="anh"></li>
    </ul>
</footer>

<script>
function toggleBank() {
    document.getElementById("bank_box").style.display =
        (document.getElementById("phuong_thuc").value === "Bank") ? "block" : "none";
}

function checkPay() {
    if (document.getElementById("phuong_thuc").value === "Bank") {
        if (
            document.getElementById("ten_ngan_hang").value === "" ||
            document.getElementById("so_tai_khoan").value.trim() === ""
        ) {
            alert("Vui lòng nhập đầy đủ thông tin ngân hàng!");
            return false;
        }
    }
    return true;
}

</script>

</body>
</html>



