<?php
session_start();
include "../config/database.php";
if (!isset($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
}
if (isset($_GET['add'])) {

    if (!isset($_SESSION['id_nguoi_dung'])) {
        header("Location: dangnhap.php?msg=login-required");
        exit;
    }

    $id_sp   = (int)$_GET['add'];
    $id_size = (int)$_GET['size'];
    $qty = (int)$_GET['soluong'];
    if ($qty < 1) {
        header("Location: giohang.php");
        exit;
    }



    if ($id_sp > 0 && $id_size > 0) {
        $rs_kho = mysqli_query(
    $conn,
    "SELECT so_luong FROM san_pham_kich_co
     WHERE id_san_pham = $id_sp AND id_kich_co = $id_size"
);
if (!$rs_kho || mysqli_num_rows($rs_kho) == 0) exit;

$row_kho = mysqli_fetch_assoc($rs_kho);
$ton_kho = (int)$row_kho['so_luong'];

// ❌ nhập vượt kho → chặn
if ($qty > $ton_kho) {
    header("Location: giohang.php");
    exit;
}



        $key = $id_sp . "-" . $id_size;

        if (!isset($_SESSION['gio_hang'][$key])) {

            $_SESSION['gio_hang'][$key] = [
                'id_san_pham' => $id_sp,
                'id_kich_co'  => $id_size,
                'so_luong'    => $qty
            ];

        } else {
            if ($_SESSION['gio_hang'][$key]['so_luong'] + $qty > $ton_kho) {
    exit;
}
$_SESSION['gio_hang'][$key]['so_luong'] += $qty;

        }
    }

    header("Location: giohang.php");
    exit;
}


if (isset($_GET['xoa'])) {
    unset($_SESSION['gio_hang'][$_GET['xoa']]);
    header("Location: giohang.php");
    exit;
}

if (isset($_POST['update'])) {

    $old_key  = $_POST['update'];
    $new_size = (int)$_POST['size'];
    $new_qty  = max(1, (int)$_POST['soluong']);

    list($id_sp, $old_size) = explode("-", $old_key);
    $new_key = $id_sp . "-" . $new_size;
    $sql = "SELECT so_luong 
            FROM san_pham_kich_co 
            WHERE id_san_pham = $id_sp 
              AND id_kich_co  = $new_size";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($rs);
    if (!$row) {
        header("Location: giohang.php");
        exit;
    }
    if ($new_qty > (int)$row['so_luong']) {
        header("Location: giohang.php");
        exit;
    }
    $_SESSION['gio_hang'][$new_key] = [
        'id_san_pham' => $id_sp,
        'id_kich_co'  => $new_size,
        'so_luong'    => $new_qty
    ];

    if ($new_key != $old_key) {
        unset($_SESSION['gio_hang'][$old_key]);
    }

    header("Location: giohang.php?msg=updated");
    exit;
}

?>
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

.btn-update:hover {
    background: #7a5334;
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

.btn-pay:hover {
    background:#7a5334;
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
<div class="cart-container">

<h2 class="cart-title">Giỏ hàng của bạn</h2>
<?php
if (isset($_GET['err'])) {
    if ($_GET['err'] == 'out-of-stock') {
        echo "<p style='color:red;font-weight:bold;'>
                Số lượng vượt quá tồn kho!
              </p>";
    }
    if ($_GET['err'] == 'invalid') {
        echo "<p style='color:red;font-weight:bold;'>
                Sản phẩm hoặc size không hợp lệ!
              </p>";
    }
}
if (isset($_GET['msg']) && $_GET['msg'] == 'updated') {
    echo "<p style='color:green;font-weight:bold;'>
            Cập nhật giỏ hàng thành công!
          </p>";
}
?>

<?php if (empty($_SESSION['gio_hang'])): ?>

    <p>Giỏ hàng đang trống.</p>
    <a href="index.php" class="btn-pay">Tiếp tục mua</a>

<?php else: ?>

<?php
$tong_tien = 0;

foreach ($_SESSION['gio_hang'] as $key => $item):

$id_sp   = $item['id_san_pham'];
$id_size = $item['id_kich_co'];

$sql = "
SELECT sp.ten_san_pham, sp.gia, sp.hinh_anh, kc.ten_kich_co 
FROM san_pham sp 
JOIN kich_co kc ON kc.id_kich_co = $id_size 
WHERE sp.id_san_pham = $id_sp";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs);

$rs_kho = mysqli_query(
    $conn,
    "SELECT so_luong FROM san_pham_kich_co
     WHERE id_san_pham = $id_sp AND id_kich_co = $id_size"
);
$row_kho = mysqli_fetch_assoc($rs_kho);
$ton_kho = (int)$row_kho['so_luong'];


$thanh_tien = $row['gia'] * $item['so_luong'];
$tong_tien += $thanh_tien;
?>
<div class="cart-item">

    <img src="../images/<?= $row['hinh_anh'] ?>">

    <div class="cart-info">
        <h3><?= $row['ten_san_pham'] ?></h3>

        <form method="post">
            <input type="hidden" name="update" value="<?= $key ?>">
            <p>Size:
                <select name="size">
                    <?php
                    $sizes = mysqli_query($conn, "SELECT * FROM kich_co");
                    while ($s = mysqli_fetch_assoc($sizes)): ?>
                        <option value="<?= $s['id_kich_co'] ?>"
                            <?= ($s['id_kich_co'] == $id_size) ? "selected" : "" ?>>
                            <?= $s['ten_kich_co'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </p>
            <p>Số lượng:<input type="number"
       name="soluong"
       min="1"
       max="<?= $ton_kho ?>"
       value="<?= $item['so_luong'] ?>"
       required>

            </p>
            <button class="btn-update">Cập nhật</button>
</form>

        <p>Giá: <b><?= number_format($row['gia']) ?>đ</b></p>
        <p>Thành tiền: <b><?= number_format($thanh_tien) ?>đ</b></p>

        <a href="giohang.php?xoa=<?= $key ?>" class="btn-remove">Xóa</a>
    </div>

</div>
<?php endforeach; ?>
<div class="cart-total">Tổng cộng: <?= number_format($tong_tien) ?>đ</div>
<?php if (!isset($_SESSION['id_nguoi_dung'])): ?>
    <a href="dangnhap.php?msg=login-to-pay" class="btn-pay" style="background:#a33;">Đăng nhập để thanh toán</a>
<?php else: ?> 
    <a href="thanhtoan.php" class="btn-pay">Đi đến thanh toán</a>
<?php endif; ?>
<?php endif; ?>
</div>
<footer class="footer">
    <ul class="info">
      <h4 style="font-weight: bold;">HỘ KINH DOANH MIUSA </h4>
    </ul>
    <ul class="info">
      <h4 style="font-weight: bold;">LIÊN KẾT</h4>
      <li>Chính sách bảo mật</li>
      <li>Hướng dẫn mua hàng</li>
      <li>Chính sách đổi trả</li>
      <li>Hướng dẫn thanh toán</li>
      <li>Chính sách vận chuyển</li>
      <li>Chính sách kiểm hàng</li>
    </ul>
    <ul class="info">
      <h4 style="font-weight: bold;">THÔNG TIN LIÊN HỆ</h4>
      <li><i class="fa fa-phone"></i> 0909090909</li>
      <li><i class="fa fa-location-arrow"></i> 180 Cao Lỗ, P. Chánh Hưng, TPHCM</li>
    </ul>
    <ul class="info">
      <h4 style="font-weight: bold;">FANPAGE</h4>
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