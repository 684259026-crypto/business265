<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])):
    require 'connect.php';

    // ตรวจสอบว่ามีข้อมูลครบถ้วนก่อน Insert
    $sql = "INSERT INTO customer (CustomerID, Name, Birthdate, Email, CountryCode, OutstandingDebt) 
            VALUES (:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindparam(':Name', $_POST['Name']);
    $stmt->bindparam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindparam(':Email', $_POST['Email']);
    $stmt->bindparam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindparam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()):
        echo "<script>
                alert('เพิ่มข้อมูลสำเร็จ!');
                window.location.href='index_stu.php';
              </script>";
    else :
        echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มข้อมูล');</script>";
    endif;
    $conn = null;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>เพิ่มข้อมูลลูกค้าใหม่</h2>
        <form action="addcustomerdropdown.php" method="post" class="card p-4 shadow-sm">
            <label>รหัสลูกค้า:</label>
            <input type="text" name="CustomerID" placeholder="เช่น C006" class="form-control mb-2" required>
            
            <label>ชื่อ-นามสกุล:</label>
            <input type="text" name="Name" placeholder="Name" class="form-control mb-2" required>
            
            <label>วันเกิด:</label>
            <input type="date" name="Birthdate" class="form-control mb-2">
            
            <label>อีเมล:</label>
            <input type="email" name="Email" placeholder="Email" class="form-control mb-2">
            
            <label>ยอดหนี้:</label>
            <input type="number" step="0.01" name="OutstandingDebt" placeholder="0.00" class="form-control mb-2">

            <label>ประเทศ:</label>
            <select name="CountryCode" id="CountryCode" class="form-select mb-3" required>
                <option value="">-- กรุณาเลือกประเทศ --</option>
                <option value="AT">ออสเตรีย</option>
                <option value="AU">ออสเตรเลีย</option>
                <option value="CN">จีน</option>
                <option value="JP">ญี่ปุ่น</option>
                <option value="TH">ไทย</option>
                <option value="UK">อังกฤษ</option>
            </select>
            
            <div class="mt-3">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                <a href="index_stu.php" class="btn btn-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
</body>
</html>