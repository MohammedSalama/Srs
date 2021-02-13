<?php 

//control admins

session_start();

if (! isset($_SESSION['adminId']))
{
    header("location: login.php");
}


?>
<?php include("inc/header.php"); ?>

<div class="container my-5">
    <div class="col-md-10 offset-md-1">

        <h5>Welcome <?= $_SESSION['adminName']; ?></h5>
        <hr>
        <h1>All Students</h1>

        <?php 
                $servername = "localhost";
                $username = "root";
                $dbpassword = "";
                $dbname = "srs";
        
                // Create connection
                $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
                // Check connection
                if (!$conn) 
                {
                    //كده كده خربانه فانهى الكود لو فيه مشكله 
                    die("Connection failed: " . mysqli_connect_error());
                }
        
                $sql = "SELECT * FROM students " ;
        
                $result = mysqli_query($conn, $sql);
                $students = mysqli_fetch_all($result , MYSQLI_ASSOC);
                //  echo '<pre>';
                // print_r($students);
                // echo '</pre>';


            ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">spec</th>
                    <th scope="col">year</th>
                    <th scope="col">created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student ) { ?>
                <tr>
                    <td><?= $student['id']; ?></td>
                    <td><?= $student['name']; ?></td>
                    <td><?= $student['email']; ?></td>
                    <td><?= $student['phone']; ?></td>
                    <td><?= $student['spec']; ?></td>
                    <td><?= $student['year']; ?></td>
                    <td><?= $student['created_at']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>