<?php
require_once('connect.php');

if (isset($_GET['CustomerID'])) {
    $id = $_GET['CustomerID'];

    try {
        $sql = "DELETE FROM customer WHERE CustomerID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {

            echo "<script>
                    alert('ลบข้อมูลลูกค้า $id เรียบร้อยแล้ว');
                    window.location.href='index_stu.php';
                  </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('ไม่สามารถลบข้อมูลได้: " . addslashes($e->getMessage()) . "');
                window.location.href='index_stu.php';
              </script>";
    }
} else {
    header("Location: index_stu.php");
}

$conn = null;
?>