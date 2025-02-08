<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>


                    <li>
                        <a href="create.php" class="nav-link" href="#">Add new</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- DISPLAY -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">HỌ TÊN</th>
                <th scope="col">ẢNH ĐẠI DIỆN</th>
                <th scope="col">EMAIL</th>
                <th scope="col">SỐ ĐIỆN THOẠI</th>
                <th scope="col">Actions</th>
            
            </tr>
        </thead>
        <tbody>

        <?php
        require_once 'connection.php';
        $sql = 'SELECT * FROM students';
        $result = $conn->query($sql);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
           echo '
            <tr>
            <th scope="row">'.$row['id'].'</th>
            <td>'.$row['fullname'].'</td>
            <td><img style="width:50px; height:50px;" src="'.$row['image'].'" alt=""></td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            <td>
            <a  class="btn btn-primary" href="update.php?id='.$row['id'].'">Edit</a>
            <a  class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>
            </td>
        </tr>
           ';
           
        }
        ?>
        
          
        
        </tbody>
    </table>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>