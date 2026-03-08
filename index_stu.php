<?php
require_once('connect.php');
$sql = "SELECT c.*, ct.CountryName FROM customer as c 
        INNER JOIN country as ct ON c.CountryCode = ct.CountryCode";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>รายชื่อลูกค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>รายชื่อลูกค้า <a href="addcustomerdropdown.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a></h3>
        <table class="table table-striped table-hover table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>รหัสลูกค้า</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ประเทศ</th>
                    <th>ยอดหนี้</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $r) { ?>
                <tr>
                    <td><?= $r['CustomerID'] ?></td>
                    <td><?= $r['Name'] ?></td>
                    <td><?= $r['CountryName'] ?></td>
                    <td align="right"><?= number_format($r['OutstandingDebt'], 2) ?></td>
                    <td><a href="updatecustomerform.php?CustomerID=<?= $r['CustomerID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                    <td>
    <a href="deleteCustomer.php?CustomerID=<?= $r['CustomerID'] ?>" 
       class="btn btn-danger btn-sm" 
       onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลลูกค้ารหัส <?= $r['CustomerID'] ?>?');">
       ลบ
    </a>
</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>