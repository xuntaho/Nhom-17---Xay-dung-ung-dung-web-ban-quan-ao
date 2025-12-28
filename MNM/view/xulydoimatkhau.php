<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['id_nguoi_dung'])) {
    header("Location: dangnhap.php");
    exit;
}

$id = $_SESSION['id_nguoi_dung'];
$mk_cu= $_POST['mat_khau_cu'] ?? '';
$mk_moi = $_POST['mat_khau_moi'] ?? '';
$mk_moi2 = $_POST['mat_khau_moi2'] ?? '';

if ($mk_moi !== $mk_moi2) {
    header("Location: doimatkhau.php?err=Mật khẩu mới không khớp");
    exit;
}

$sql  = "SELECT mat_khau FROM nguoi_dung WHERE id_nguoi_dung = $id";
$rs   = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($rs);

if (strlen($mk_cu) > 0) {
    header("Location: doimatkhau.php?err=Mật khẩu cũ không đúng");
    exit;
}
$sql_update = "
    UPDATE nguoi_dung
    SET mat_khau = '$mk_moi'
    WHERE id_nguoi_dung = $id
";
mysqli_query($conn, $sql_update);

header("Location: doimatkhau.php?ok=Đổi mật khẩu thành công");
exit;
