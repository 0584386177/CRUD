<?php
require_once "connection.php";

 $fullname;
 $email;
 $phone;
 $image;
try {
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $image = $_POST['image'];
        
        $sql = "INSERT INTO students(fullname,email,phone,image) VALUES ('$fullname','$email','$phone','$image')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('Location:index.php');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form with Bootstrap</title>
  <!-- Thêm liên kết tới Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">CREATE</h2>
    <form method="POST" class="form">
      <div class="form-group mb-3">
        <label for="name">Full Name :</label>
        <input type="text" name="fullname" id="name" class="form-control" placeholder="Enter your name">
      </div>
      <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
      </div>
      <div class="form-group mb-3">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
      </div>
      <div class="form-group mb-3">
        <label for="img">Image:</label>
        <input type="text" name="image" class="form-control" id="img" name="img">
      </div>
      <button name="submit" type="submit" class="btn btn-primary w-100">Submit</button>
      <a href="index.php" class="btn btn-second w-100">Cancel</a>
    </form>
  </div>

  <!-- <script>
    const form = document.querySelector('.form');
    form.addEventListener("submit",(e)=>{
        e.preventDefault();
    })
    

  </script> -->
  <!-- Thêm liên kết tới Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
