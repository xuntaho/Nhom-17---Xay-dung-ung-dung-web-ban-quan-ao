<?php
session_start();
include "../config/database.php";

if (!isset($_POST['btn_doimatkhau'])) {
    header("Location: doimatkhau.php");
    exit;
}

if (!isset($_SESSION['id_nguoi_dung'])) {
    header("Location: dangnhap.php");
    exit;
}

$id = $_SESSION['id_nguoi_dung'];

$mk_cu   = $_POST['mat_khau_cu'];
$mk_moi  = $_POST['mat_khau_moi'];
$mk_moi2 = $_POST['mat_khau_moi2'];

$sql = "SELECT mat_khau FROM nguoi_dung WHERE id_nguoi_dung = $id";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs);

if ($row['mat_khau'] != $mk_cu) {
    header("Location: doimatkhau.php?err=Mật khẩu cũ không đúng!");
    exit;
}

if ($mk_moi != $mk_moi2) {
    header("Location: doimatkhau.php?err=Mật khẩu mới nhập lại không khớp!");
    exit;
}

mysqli_query($conn,
    "UPDATE nguoi_dung SET mat_khau='$mk_moi' WHERE id_nguoi_dung = $id"
);

header("Location: doimatkhau.php?ok=Đổi mật khẩu thành công!");
exit;
?>