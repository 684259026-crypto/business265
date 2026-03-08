<?php
require_once('connect.php');
// 1. ดึงข้อมูลลูกค้าคนที่จะแก้ไข
$stmt_customer = $conn->prepare("SELECT * FROM customer WHERE CustomerID = :CID");
$stmt_customer->bindParam(':CID', $_GET['CustomerID']);
$stmt_customer->execute();
$res = $stmt_customer->fetch(PDO::FETCH_ASSOC);

$stmt_c = $conn->prepare("SELECT * FROM country");
$stmt_c->execute();
$countries = $stmt_c->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" style="max-width: 600px;">
        <h2>แก้ไขข้อมูลลูกค้า</h2>
        <form action="updatecustomerDB.php" method="POST" class="card p-4 shadow-sm">
            <label>รหัสลูกค้า (แก้ไขไม่ได้):</label>
            <input type="text" name="CustomerID" value="<?= $res['CustomerID'] ?>" readonly class="form-control mb-2 bg-light">
            
            <label>ชื่อ-นามสกุล:</label>
            <input type="text" name="Name" value="<?= $res['Name'] ?>" required class="form-control mb-2">
            
            <label>Email:</label>
            <input type="email" name="Email" value="<?= $res['Email'] ?>" class="form-control mb-2">
            
            <label>ยอดหนี้:</label>
            <input type="number" step="0.01" name="OutstandingDebt" value="<?= $res['OutstandingDebt'] ?>" class="form-control mb-2">
            
            <label>ประเทศ:</label>
            <select name="CountryCode" class="form-select mb-3">
                <?php foreach ($countries as $c) { 
                    $sel = ($c['CountryCode'] == $res['CountryCode']) ? "selected" : "";
                    echo "<option value='{$c['CountryCode']}' $sel>{$c['CountryName']}</option>";
                } ?>
            </select>
            
            <button type="submit" class="btn btn-primary w-100">บันทึกการแก้ไข</button>
            <a href="index_stu.php" class="btn btn-secondary w-100 mt-2">ยกเลิก</a>
        </form>
    </div>
</body>
</html>