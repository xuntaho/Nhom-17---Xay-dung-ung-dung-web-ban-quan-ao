<?php
session_start();
include "../config/database.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET["id"];

/* ------------------------
    LẤY THÔNG TIN SẢN PHẨM
------------------------- */
$sql = "SELECT * FROM san_pham WHERE id_san_pham = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$sp = mysqli_fetch_assoc($result);

if (!$sp) {
    header("Location: index.php");
    exit;
}

/* ------------------------
    LẤY SIZE CÒN HÀNG
------------------------- */
$sql_size = "SELECT kc.id_kich_co, kc.ten_kich_co
             FROM san_pham_kich_co spkc
             INNER JOIN kich_co kc ON kc.id_kich_co = spkc.id_kich_co
             WHERE spkc.id_san_pham = ? AND spkc.so_luong > 0";

$stmt2 = mysqli_prepare($conn, $sql_size);
mysqli_stmt_bind_param($stmt2, "i", $id);
mysqli_stmt_execute($stmt2);
$res_size = mysqli_stmt_get_result($stmt2);

function e($v) {
    return htmlspecialchars($v, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($sp["ten_san_pham"]); ?> - MIUSA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
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

        <?php if (!isset($_SESSION["id_nguoi_dung"])) { ?>
            <a href="dangnhap.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
        <?php } else { ?>
            <span style="color:black; font-size: 15px;">
                Chào bạn <?php echo $_SESSION["ten_dang_nhap"]; ?>
            </span>
            <a href="thongtintaikhoan.php"><i class="fa-solid fa-user"></i> Tài khoản</a>
        <?php } ?> 

    </nav>
</header>

<!-- CHI TIẾT -->
<div class="detail-container">
    <div class="detail-left">
        <img src="../images/<?php echo e($sp["hinh_anh"]); ?>" alt="">
    </div>

    <div class="detail-right">

        <h1><?php echo e($sp["ten_san_pham"]); ?></h1>

        <div class="detail-price">
            <?php echo number_format($sp["gia"]); ?>đ
        </div>

        <p class="detail-desc"><?php echo nl2br(e($sp["mo_ta"])); ?></p>

        <!-- FORM THÊM GIỎ -->
        <form action="giohang.php" method="get" onsubmit="return kiemTra()">

            <input type="hidden" name="add" value="<?php echo $id; ?>">

            <label><b>Chọn size:</b></label><br>
            <select name="size" id="size" class="select-size">
                <option value="">-- Chọn size --</option>

                <?php while ($row = mysqli_fetch_assoc($res_size)) { ?>
                    <option value="<?php echo $row["id_kich_co"]; ?>">
                        <?php echo e($row["ten_kich_co"]); ?>
                    </option>
                <?php } ?>

            </select>

            <p id="err" style="color:red; font-size:14px;"></p>

            <br>

            <label><b>Số lượng:</b></label><br>
            <input type="number" name="soluong" value="1" min="1" class="quantity">

            <br><br>

            <button class="btn-add">Thêm vào giỏ</button>
        </form>

        <br>

        <a href="index.php" class="back-link">← Quay lại cửa hàng</a>

    </div>
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
      <li><img src="../images/fb.png" class="anh"></li>
      <li><img src="../images/instagram.png" class="anh"></li>
    </ul>
</footer>

<script>
function kiemTra() {
    let size = document.getElementById("size").value;
    let err = document.getElementById("err");

    if (size === "") {
        err.innerHTML = "Vui lòng chọn size!";
        return false;
    }

    err.innerHTML = "";
    return true;
}
</script>

</body>
</html>
