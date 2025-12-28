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

$id_nguoi_dung = $_SESSION['id_nguoi_dung'];
$ho_ten        = $_POST['ho_ten'];
$so_dien_thoai_nhan = $_POST['so_dien_thoai'];
$dia_chi_nhan       = $_POST['dia_chi'];
$phuong_thuc   = $_POST['phuong_thuc'];
$ghi_chu       = $_POST['ghi_chu'] ?? '';

$ten_ngan_hang = $_POST['ten_ngan_hang'] ?? NULL;
$so_tai_khoan  = $_POST['so_tai_khoan'] ?? NULL;

// TÍNH TỔNG TIỀN
$tong_tien = 0;
foreach ($_SESSION['gio_hang'] as $item) {
    $rs = mysqli_query($conn,
        "SELECT gia FROM san_pham WHERE id_san_pham = {$item['id_san_pham']}"
    );
    $sp = mysqli_fetch_assoc($rs);
    $tong_tien += $sp['gia'] * $item['so_luong'];
}

// TẠO ĐƠN HÀNG
mysqli_query($conn, "
INSERT INTO don_hang
(id_nguoi_dung, tong_tien, ho_ten, so_dien_thoai_nhan, dia_chi_nhan,
 phuong_thuc, ten_ngan_hang, so_tai_khoan, ghi_chu, trang_thai)
VALUES
($id_nguoi_dung, $tong_tien, '$ho_ten', '$so_dien_thoai_nhan', '$dia_chi_nhan',
 '$phuong_thuc', '$ten_ngan_hang', '$so_tai_khoan', '$ghi_chu', 'Chờ xử lý')
");

$id_don_hang = mysqli_insert_id($conn);

// CHI TIẾT ĐƠN HÀNG + TRỪ KHO
foreach ($_SESSION['gio_hang'] as $item) {
    $rs = mysqli_query($conn,
        "SELECT gia FROM san_pham WHERE id_san_pham = {$item['id_san_pham']}"
    );
    $sp = mysqli_fetch_assoc($rs);

    mysqli_query($conn, "
        INSERT INTO chi_tiet_don_hang
        (id_don_hang, id_san_pham, id_kich_co, so_luong, don_gia)
        VALUES
        ($id_don_hang, {$item['id_san_pham']}, {$item['id_kich_co']},
         {$item['so_luong']}, {$sp['gia']})
    ");

    mysqli_query($conn, "
        UPDATE san_pham_kich_co
        SET so_luong = so_luong - {$item['so_luong']}
        WHERE id_san_pham = {$item['id_san_pham']}
          AND id_kich_co  = {$item['id_kich_co']}
    ");
}

unset($_SESSION['gio_hang']);

header("Location: dathangthanhcong.php?id=$id_don_hang");
exit;
?>

