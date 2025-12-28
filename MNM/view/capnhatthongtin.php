<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['id_nguoi_dung'])) {
    header("Location: dangnhap.php");
    exit;
}

$id = $_SESSION['id_nguoi_dung'];
$sql = "SELECT * FROM nguoi_dung WHERE id_nguoi_dung = $id";
$user = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$thongbao = "";
$loi = "";

if (isset($_POST['btn_update'])) {

    $ten_dang_nhap = trim($_POST['ten_dang_nhap']);
    $so_dt  = trim($_POST['so_dien_thoai']);
    $dia_chi = trim($_POST['dia_chi']);

    if ($ten_dang_nhap === "") {
        $loi = "Tên đăng nhập không được để trống";
    } elseif ($so_dt !== "" && !preg_match('/^[0-9]{9,11}$/', $so_dt)) {
        $loi = "Số điện thoại không hợp lệ";
    } else {

        $check = mysqli_query($conn, "
            SELECT id_nguoi_dung 
            FROM nguoi_dung 
            WHERE ten_dang_nhap = '$ten_dang_nhap'
              AND id_nguoi_dung <> $id
        ");

        if (mysqli_num_rows($check) > 0) {
            $loi = "Tên đăng nhập đã tồn tại";
        } else {

            $update = "
                UPDATE nguoi_dung SET 
                    ten_dang_nhap = '$ten_dang_nhap',
                    so_dien_thoai = '$so_dt',
                    dia_chi = '$dia_chi'
                WHERE id_nguoi_dung = $id
            ";

            mysqli_query($conn, $update);
            $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;

            header("Location: thongtintaikhoan.php?ok=1");
            exit;
        }
    }
}

$user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>

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
    margin:100px auto 100px;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    font-family: 'Istok Web';
}

.container h1 {
    text-align: center;
    color: #5b3920;
    margin-bottom: 20px;
}

.input-box {
    margin-bottom: 18px;
}

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
.btn-save:hover {
    background:#7b573b;
}

.thongbao {
    text-align:center;
    color: green;
    font-size: 18px;
    margin-bottom: 15px;
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
<div class="container">

    <h1>Thông tin tài khoản</h1>
        <?php if ($loi != ""): ?>
        <p style="color:red;text-align:center;font-size:18px;"><?= $loi ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['ok'])): ?>
        <p class="thongbao">Cập nhật thông tin thành công!</p>
    <?php endif; ?>


    <?php if ($thongbao != "") echo "<p class='thongbao'>$thongbao</p>"; ?>

    <form method="post">

        <div class="input-box">
            <label>Tên đăng nhập</label>
            <input type="text" name="ten_dang_nhap" value="<?= $user['ten_dang_nhap']; ?>" required>
        </div>

        <div class="input-box">
            <label>Số điện thoại</label>
            <input type="text" name="so_dien_thoai" value="<?= $user['so_dien_thoai']; ?>">
        </div>

        <div class="input-box">
            <label>Địa chỉ</label>
            <input type="text" name="dia_chi" value="<?= $user['dia_chi']; ?>">
        </div>

        <button class="btn-save" name="btn_update">Lưu thay đổi</button>
    </form>

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

</body>
</html>