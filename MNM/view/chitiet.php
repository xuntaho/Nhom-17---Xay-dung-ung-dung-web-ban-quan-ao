<?php
session_start();
include "../config/database.php";


if (!isset($_GET['id'])) {
    die("Không có sản phẩm.");
}

$id = (int)$_GET['id'];


$sql_sp = "SELECT * FROM san_pham WHERE id_san_pham = $id";
$rs_sp  = mysqli_query($conn, $sql_sp);
$sp     = mysqli_fetch_assoc($rs_sp);

if (!$sp) {
    die("Sản phẩm không tồn tại.");
}


$sql_size = "
    SELECT kc.id_kich_co, kc.ten_kich_co
    FROM san_pham_kich_co spkc
    JOIN kich_co kc ON kc.id_kich_co = spkc.id_kich_co
    WHERE spkc.id_san_pham = $id
      AND spkc.so_luong > 0
";
$rs_size = mysqli_query($conn, $sql_size);
$kho_theo_size = [];

$rs_kho = mysqli_query(
    $conn,
    "SELECT id_kich_co, so_luong
     FROM san_pham_kich_co
     WHERE id_san_pham = $id"
);

while ($r = mysqli_fetch_assoc($rs_kho)) {
    $kho_theo_size[$r['id_kich_co']] = (int)$r['so_luong'];
}


if (!isset($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
}


if (isset($_POST['add_to_cart'])) {
    $id_sp   = (int)$_POST['id_san_pham'];
    $id_size = (int)$_POST['size'];
    if ($id_size <= 0) {
    header("Location: chitietsanpham.php?id=$id_sp");
    exit;
}

    $qty = (int)$_POST['soluong'];
if ($qty < 1) {
    header("Location: chitietsanpham.php?id=$id_sp");
    exit;
}

$rs = mysqli_query(
    $conn,
    "SELECT so_luong FROM san_pham_kich_co
     WHERE id_san_pham = $id_sp AND id_kich_co = $id_size"
);
if (!$rs || mysqli_num_rows($rs) == 0) exit;

$row = mysqli_fetch_assoc($rs);
$ton_kho = (int)$row['so_luong'];

if ($qty > $ton_kho) {
    header("Location: chitietsanpham.php?id=$id_sp");
    exit;
}


    if ($id_sp > 0 && $id_size > 0) {
        $key = $id_sp . "-" . $id_size;

        if (!isset($_SESSION['gio_hang'][$key])) {
            $_SESSION['gio_hang'][$key] = [
                'id_san_pham' => $id_sp,
                'id_kich_co'  => $id_size,
                'so_luong'    => $qty
            ];
        } else {
            if ($_SESSION['gio_hang'][$key]['so_luong'] + $qty > $ton_kho) {
                header("Location: chitietsanpham.php?id=$id_sp");
    exit;
}
$_SESSION['gio_hang'][$key]['so_luong'] += $qty;

        }

        header("Location: giohang.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title><?php echo $sp['ten_san_pham']; ?> - MIUSA</title>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
.err-size {
    color: red;
    font-size: 16px;
    margin-top: 5px;
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

<div class="detail-container">
    <div class="detail-left">
        <img src="../images/<?php echo $sp['hinh_anh']; ?>">
    </div>

    <div class="detail-right">
        <h1><?php echo $sp['ten_san_pham']; ?></h1>
        <div class="detail-price">
            <?php echo number_format($sp['gia'], 0, ',', '.'); ?> đ
        </div>

        <p class="detail-desc"><?php echo nl2br($sp['mo_ta']); ?></p>

        <form method="post" onsubmit="return kiemTra();">
            <input type="hidden" name="id_san_pham"
                   value="<?php echo $sp['id_san_pham']; ?>">

            <label><b>Chọn size:</b></label><br>
            <select name="size" id="size">
                <option value="">-- Chọn size --</option>
                <?php while ($s = mysqli_fetch_assoc($rs_size)) { ?>
                    <option value="<?php echo $s['id_kich_co']; ?>">
                        <?php echo $s['ten_kich_co']; ?>
                    </option>
                <?php } ?>
            </select>

            <p id="err_size" class="err-size"></p>

            <label><b>Số lượng:</b></label><br>
            <input type="number"
                   name="soluong"
                   id="soluong"
                   min="1"
                   required>


            <br><br>
            <button class="btn-add" name="add_to_cart">
                Thêm vào giỏ
            </button>
        </form>

        <br>
        <a href="index.php"
           style="font-size:18px;color:#5b3920;text-decoration:none;">
            ← Quay lại cửa hàng
        </a>
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
const tonKhoTheoSize = <?= json_encode($kho_theo_size) ?>;

function kiemTra() {
    const size = document.getElementById("size").value;
    const err  = document.getElementById("err_size");
    const qty  = document.getElementById("soluong");

    err.innerHTML = "";

    if (size === "") {
        err.innerHTML = "Vui lòng chọn size!";
        return false;
    }

    if (qty.value < 1) return false;

    if (parseInt(qty.value) > parseInt(qty.max)) {
    return false;
}


    return true;
}

document.getElementById("size").addEventListener("change", function () {
    const size = this.value;
    const qty  = document.getElementById("soluong");

    if (tonKhoTheoSize[size] !== undefined) {
        qty.max = tonKhoTheoSize[size];
        qty.value = 1;
    } else {
        qty.removeAttribute("max");
    }
});
</script>


</body>
</html>
