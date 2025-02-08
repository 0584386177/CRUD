<?php
// Kết nối tới cơ sở dữ liệu
require_once 'connection.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    // LẤY TOÀN BỘ THÔNG TIN USER

    $sql = "SELECT * FROM students WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($student);
}else{
    echo "404 NOT FOUND";
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fullname = $_POST['fullname'];
    $image = $_POST['image'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $sql = 'UPDATE students SET fullname = :fullname,image = :image,email=:email,phone=:phone WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'fullname'=> $fullname,
        'image' => $image,
        'email' => $email,
        'phone' => $phone,
        'id'=> $id
    ]);

    header('Location:index.php');
    exit;
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Student</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Student Information</h2>

        <!-- Form để chỉnh sửa thông tin sinh viên -->
        <form method="POST" action="update.php?id=<?php echo $student['id']; ?>">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($student['fullname']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($student['image']); ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
