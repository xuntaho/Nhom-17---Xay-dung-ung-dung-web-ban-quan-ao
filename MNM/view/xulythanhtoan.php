<?php
session_start();
include "../config/database.php";

if (!isset($_POST['btn_thanhtoan'])) {
    header("Location: giohang.php");
    exit;
}

if (empty($_SESSION['gio_hang'])) {
     header("Location: giohang.php");
    exit;
}

// ================= LẤY DỮ LIỆU FORM =================
$ho_ten = $_POST['ho_ten'];
$so_dien_thoai_nhan = $_POST['so_dien_thoai_nhan'];
$dia_chi_nhan = $_POST['dia_chi_nhan'];
$ghi_chu = $_POST['ghi_chu'] ?? "";
$phuong_thuc = $_POST['phuong_thuc'];
$tong_tien = (int)$_POST['tong_tien'];

$ten_ngan_hang = $_POST['ten_ngan_hang'] ?? NULL;
$so_tai_khoan  = $_POST['so_tai_khoan'] ?? NULL;

$id_nguoi_dung = $_SESSION['id_nguoi_dung'] ?? 0;

// ================= TRANSACTION =================
mysqli_begin_transaction($conn);

try {

    // ===== 1. KIỂM TRA TỒN KHO =====
    foreach ($_SESSION['gio_hang'] as $item) {
        $id_sp = $item['id_san_pham'];
        $id_size = $item['id_kich_co'];
        $so_luong_mua = $item['so_luong'];

        $check = mysqli_query(
            $conn,
            "SELECT so_luong FROM san_pham_kich_co 
             WHERE id_san_pham = $id_sp AND id_kich_co = $id_size"
        );

        $row = mysqli_fetch_assoc($check);

        if (!$row || $row['so_luong'] < $so_luong_mua) {
            throw new Exception("Sản phẩm không đủ tồn kho!");
        }
    }

    // ===== 2. TẠO ĐƠN HÀNG =====
    $sql = "INSERT INTO don_hang
    (id_nguoi_dung, tong_tien, ho_ten, dia_chi_nhan, so_dien_thoai_nhan,
     ghi_chu, phuong_thuc, ten_ngan_hang, so_tai_khoan)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "iisssssss",
        $id_nguoi_dung,
        $tong_tien,
        $ho_ten,
        $dia_chi_nhan,
        $so_dien_thoai_nhan,
        $ghi_chu,
        $phuong_thuc,
        $ten_ngan_hang,
        $so_tai_khoan
    );
    mysqli_stmt_execute($stmt);

    $id_don_hang = mysqli_insert_id($conn);

    // ===== 3. CHI TIẾT ĐƠN HÀNG + TRỪ KHO =====
    foreach ($_SESSION['gio_hang'] as $item) {
        $id_sp = $item['id_san_pham'];
        $id_size = $item['id_kich_co'];
        $soluong = $item['so_luong'];

        $q = mysqli_query($conn, "SELECT gia FROM san_pham WHERE id_san_pham = $id_sp");
        $gia = mysqli_fetch_assoc($q)['gia'];

        mysqli_query(
            $conn,
            "INSERT INTO chi_tiet_don_hang
            (id_don_hang, id_san_pham, id_kich_co, so_luong, don_gia)
            VALUES ($id_don_hang, $id_sp, $id_size, $soluong, $gia)"
        );

        // trừ tồn kho
        mysqli_query(
            $conn,
            "UPDATE san_pham_kich_co
             SET so_luong = so_luong - $soluong
             WHERE id_san_pham = $id_sp AND id_kich_co = $id_size"
        );
    }

    // ===== 4. HOÀN TẤT =====
   // ===== 4. HOÀN TẤT =====
mysqli_commit($conn);
unset($_SESSION['gio_hang']);

// gắn cờ thông báo thành công
$_SESSION['thanhtoan_success'] = true;

// quay về giỏ hàng (có header + footer đầy đủ)
header("Location: giohang.php");
exit;


} catch (Exception $e) {
    mysqli_rollback($conn);
    exit("Lỗi đặt hàng: " . $e->getMessage());
}
?>
