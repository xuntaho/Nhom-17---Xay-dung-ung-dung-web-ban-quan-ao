<?php
session_start();
include "../config/database.php";

/* =================================
   KHỞI TẠO GIỎ HÀNG
================================= */
if (!isset($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
}

/* =================================
   1️⃣ ADD SAU KHI LOGIN (QUAN TRỌNG NHẤT)
   → PHẢI ĐẶT TRƯỚC MỌI LOGIC KHÁC
================================= */
if (
    isset($_SESSION['id_nguoi_dung']) &&
    isset($_SESSION['pending_add_to_cart'])
) {
    $p = $_SESSION['pending_add_to_cart'];

    if ($p['id_sp'] > 0 && $p['id_size'] > 0) {

        $key = $p['id_sp'] . "-" . $p['id_size'];

        if (!isset($_SESSION['gio_hang'][$key])) {
            $_SESSION['gio_hang'][$key] = [
                'id_san_pham' => $p['id_sp'],
                'id_kich_co'  => $p['id_size'],
                'so_luong'    => $p['soluong']
            ];
        } else {
            $_SESSION['gio_hang'][$key]['so_luong'] += $p['soluong'];
        }
    }

    // ❗ PHẢI XÓA – nếu không sẽ add lặp
    unset($_SESSION['pending_add_to_cart']);

    header("Location: giohang.php");
    exit;
}

/* =================================
   2️⃣ THÊM VÀO GIỎ (KHI BẤM NÚT)
================================= */
if (isset($_GET['add'])) {

    $id_sp   = (int)$_GET['add'];
    $id_size = (int)$_GET['size'];
    $qty     = max(1, (int)$_GET['soluong']);

    // Chưa đăng nhập → lưu tạm
    if (!isset($_SESSION['id_nguoi_dung'])) {

        $_SESSION['pending_add_to_cart'] = [
            'id_sp'   => $id_sp,
            'id_size' => $id_size,
            'soluong' => $qty
        ];

        header("Location: dangnhap.php?msg=login-required");
        exit;
    }

    // Đã login → add trực tiếp
    if ($id_sp > 0 && $id_size > 0) {

        $key = $id_sp . "-" . $id_size;

        if (!isset($_SESSION['gio_hang'][$key])) {
            $_SESSION['gio_hang'][$key] = [
                'id_san_pham' => $id_sp,
                'id_kich_co'  => $id_size,
                'so_luong'    => $qty
            ];
        } else {
            $_SESSION['gio_hang'][$key]['so_luong'] += $qty;
        }
    }

    header("Location: giohang.php");
    exit;
}

/* =================================
   3️⃣ XÓA SẢN PHẨM
================================= */
if (isset($_GET['xoa'])) {
    unset($_SESSION['gio_hang'][$_GET['xoa']]);
    header("Location: giohang.php");
    exit;
}

/* =================================
   4️⃣ CẬP NHẬT SIZE / SỐ LƯỢNG
================================= */
if (isset($_POST['update'])) {

    $old_key  = $_POST['update'];
    $new_size = (int)$_POST['size'];
    $new_qty  = max(1, (int)$_POST['soluong']);

    list($id_sp, $old_size) = explode("-", $old_key);
    $new_key = $id_sp . "-" . $new_size;

    $_SESSION['gio_hang'][$new_key] = [
        'id_san_pham' => $id_sp,
        'id_kich_co'  => $new_size,
        'so_luong'    => $new_qty
    ];

    if ($new_key !== $old_key) {
        unset($_SESSION['gio_hang'][$old_key]);
    }

    header("Location: giohang.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giỏ hàng - MIUSA</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="../style/css.css">
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
        <a href="#">Lịch sử đơn hàng</a>
        <a href="#">About</a>

        <?php if (!isset($_SESSION['id_nguoi_dung'])) { ?>
            <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
            <span>Chào <?= $_SESSION['ten_dang_nhap'] ?></span>
        <?php } ?>
    </nav>
</header>

<div class="cart-wrapper">
<h1 class="cart-title">Giỏ hàng của bạn</h1>

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
WHERE sp.id_san_pham = $id_sp
";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs);

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

            <p>Số lượng:
                <input type="number" min="1" name="soluong" value="<?= $item['so_luong'] ?>">
            </p>

            <button class="btn-add">Cập nhật</button>
        </form>

        <p>Giá: <b><?= number_format($row['gia']) ?>đ</b></p>
        <p>Thành tiền: <b><?= number_format($thanh_tien) ?>đ</b></p>

        <a href="giohang.php?xoa=<?= $key ?>" class="btn-remove">Xóa</a>
    </div>
</div>

<?php endforeach; ?>

<div class="cart-total">
    Tổng cộng: <?= number_format($tong_tien) ?>đ
</div>

<a href="thanhtoan.php" class="btn-pay">Đi đến thanh toán</a>

<?php endif; ?>
</div>

</body>
</html>
