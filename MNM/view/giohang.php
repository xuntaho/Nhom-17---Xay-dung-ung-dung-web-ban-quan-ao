<?php
session_start();
include __DIR__ . "/../config/database.php";

/* ================== KHỞI TẠO GIỎ ================== */
if (!isset($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
}

/* ================== THÊM VÀO GIỎ ================== */
if (isset($_GET['add'])) {

    $id_sp   = (int)$_GET['add'];
    $id_size = (int)($_GET['size'] ?? 0);
    $qty     = max(1, (int)($_GET['soluong'] ?? 1));

    /* Chưa đăng nhập → yêu cầu login */
    if (!isset($_SESSION['id_nguoi_dung'])) {
        $_SESSION['pending_add_to_cart'] = [
            'id_sp'   => $id_sp,
            'id_size' => $id_size,
            'soluong' => $qty
        ];
        header("Location: dangnhap.php?msg=login-required");
        exit;
    }

    /* Kiểm tra tồn kho */
    $q = mysqli_query(
        $conn,
        "SELECT so_luong 
         FROM san_pham_kich_co
         WHERE id_san_pham = $id_sp
           AND id_kich_co = $id_size"
    );
    $row = mysqli_fetch_assoc($q);
    $ton_kho = $row['so_luong'] ?? 0;

    if ($qty > $ton_kho) {
        header("Location: chitiet.php?id=$id_sp&err=het-hang");
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
        $_SESSION['gio_hang'][$key]['so_luong'] += $qty;
    }

    header("Location: giohang.php");
    exit;
}

/* ================== XÓA KHỎI GIỎ ================== */
if (isset($_GET['xoa'])) {
    unset($_SESSION['gio_hang'][$_GET['xoa']]);
    header("Location: giohang.php");
    exit;
}

/* ================== CẬP NHẬT GIỎ ================== */
if (isset($_POST['update'])) {

    $old_key  = $_POST['update'];
    $new_size = (int)$_POST['size'];
    $new_qty  = max(1, (int)$_POST['soluong']);

    list($id_sp, $old_size) = explode("-", $old_key);
    $new_key = $id_sp . "-" . $new_size;

    /* Kiểm tra tồn kho */
    $q = mysqli_query(
        $conn,
        "SELECT so_luong 
         FROM san_pham_kich_co
         WHERE id_san_pham = $id_sp
           AND id_kich_co = $new_size"
    );
    $row = mysqli_fetch_assoc($q);
    $ton_kho = $row['so_luong'] ?? 0;

    if ($new_qty > $ton_kho) {
        header("Location: giohang.php?err=het-hang");
        exit;
    }

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

/* ================== HÀM ESCAPE ================== */
function e($v) {
    return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng - MIUSA</title>
    <link rel="stylesheet" href="../style/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header class="header">
    <div class="logo">MIU<span>SA</span></div>
    <nav class="menu">
        <?php include "timkiem.php"; ?>
        <a href="index.php">Home</a>
        <a href="giohang.php">Giỏ hàng</a>
        <a href="about.php">About</a>
    </nav>
</header>

<h1 style="text-align:center;margin:20px 0;">GIỎ HÀNG</h1>

<?php if (empty($_SESSION['gio_hang'])): ?>
    <p style="text-align:center;">Giỏ hàng trống</p>
<?php else: ?>

<table class="cart-table">
    <tr>
        <th>Sản phẩm</th>
        <th>Size</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Tạm tính</th>
        <th></th>
    </tr>

<?php
$tong = 0;
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

    $tien = $row['gia'] * $item['so_luong'];
    $tong += $tien;
?>
<tr>
    <td>
        <img src="../images/<?= e($row['hinh_anh']) ?>" width="80"><br>
        <?= e($row['ten_san_pham']) ?>
    </td>
    <td><?= e($row['ten_kich_co']) ?></td>
    <td>
        <form method="post" style="display:inline;">
            <input type="hidden" name="update" value="<?= e($key) ?>">
            <input type="number" name="soluong" value="<?= $item['so_luong'] ?>" min="1">
            <input type="hidden" name="size" value="<?= $id_size ?>">
            <button>Cập nhật</button>
        </form>
    </td>
    <td><?= number_format($row['gia']) ?>đ</td>
    <td><?= number_format($tien) ?>đ</td>
    <td>
        <a onclick="return confirm('Xóa sản phẩm?')"
           href="giohang.php?xoa=<?= e($key) ?>">❌</a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="4"><b>TỔNG TIỀN</b></td>
    <td colspan="2"><b><?= number_format($tong) ?>đ</b></td>
</tr>
</table>

<div style="text-align:center;margin:20px;">
    <a href="thanhtoan.php" class="btn-add">Thanh toán</a>
</div>

<?php endif; ?>

</body>
</html>
