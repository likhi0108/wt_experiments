<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'facebook1';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_error()){
    exit('Error connecting to the database'.mysqli_connect_error());
}

if(!isset($_POST['uname'],$_POST['email'],$_POST['gen'])){
    exit('Empty Field(s)');
}

if(empty($_POST['uname'] || empty($_POST['email']) || empty($_POST['gen']))){
    exit('Values Empty');
}

if($sql = $con->prepare('SELECT UserName FROM fb WHERE UserName = ?')){
    $sql->bind_param('s',$_POST['uname']);
    $sql->execute();
    $sql->store_result();
    //Username already exists
    if($sql->num_rows>0){
        echo 'Username already exists. Try Again!';
    }
    else{
            $uname = $_POST["uname"];
            $email = $_POST["email"];
            $gen=$_POST["gen"];
            $dob = $_POST["dob"];
            $pwd=$_POST["pwd"];
            $sql = "INSERT INTO fb (UserName,Email,DOB,Gender,pwd) VALUES('$uname','$email', '$dob','$gen','$pwd')";
    $upload = mysqli_query($con,$sql);
    if($upload)
    {
        echo "Registered Successfully!";
            ?>
            <table>
            <tr><th>UserName  </th>
            <th>Email  </th>
            <th>DOB  </th>
            <th>Gender  </th>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                $sql="select * from fb;";
                $result=mysqli_query($con,$sql);
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['UserName'];?></td>
                    <td><?php echo $rows['Email'];?></td>
                    <td><?php echo $rows['DOB'];?></td>
                    <td><?php echo $rows['Gender'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <div class="links">
            <a href="finalOgin.php">Move To Login Page</a>
        </div>
        <?php 

        }
        else
        {
            echo 'Error Occurred';
        }
    }
}
else{
    echo 'Error Occurred';
}
$con->close();
?>


