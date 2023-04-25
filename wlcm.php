<?php
session_start();
if ($_SESSION["uname"]) {
?>
    <html>

    <head>
        <link rel="stylesheet" href="fstyle.css">
        <title>MetaBook</title>
    </head>
    <div style="background-color:#30AEB3;"><br>
        <h3 style="text-align:center;color:#FFF;">Welcome to MetaBook.
            <br><br>
    </div>

    <div style="margin:auto; background-color:black; min-height:300px;">
        <div style="background-color:white;text-align:center; color:#30AEB3;">
            <img src="https://t3.ftcdn.net/jpg/03/98/88/12/240_F_398881279_GakDow8PXGz20Xm1mt7UZiCQ9uBu8wVF.jpg" style="width:100%; height:300px;">
            <h3 style="color:white;margin-top:-50px;"> Hello <?php echo $_SESSION["uname"]; ?>!</h3><br>
            <?php $uname = $_SESSION["uname"]; ?>
            <br>
        </div>
    </div>


    <div style="display:flex;">

        <div style="min-height:400px;flex:1;background-color:#30AEB3;">
            <div id="frnds_bar">
                <h3 style="color:white;text-align:center;">Friends List!</h3><br>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'facebook1');
                $sql = "select UserName from fb";
                $res = mysqli_query($conn, $sql);
                if ($res->num_rows > 0) {
                    // output data of each row
                    while ($row = $res->fetch_assoc()) { ?>
                        <div id="frnds">
                            <?php echo $row["UserName"]; ?>
                        </div>
                <?php
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </div>
        </div>

        <div style="min-height:400px;flex:2.5;padding:20px;">
            <div style="border:solid thin #aaa; padding:10px;">
                <!post something new>
                    <div class="container">
                        <div class="post create">
                            <div class="post-bottom">
                                <div class="action">
                                    <i class="fa fa-image">Post Something Interesting.</i>
                                    <span>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="image">
                                            <input type="submit" value="Post">
                                        </form>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>

                    </div>
                    <section class="allposts" id="allposts">
                        <div class="right" style="background:#30AEB3;" name="right">
                            <h3> Global posts</h3>
                            <?php
                            $name = $_SESSION['uname'];
                            $conn = mysqli_connect('localhost', 'root', '', 'facebook1');
                            $sql = "select UserName,fn,likes from posts order by likes desc LIMIT 5";
                            $res = mysqli_query($conn, $sql);
                            if ($res->num_rows > 0) {
                                // output data of each row
                                while ($row = $res->fetch_assoc()) {
                                    $x = $row['fn'];
                                    $y = "";
                                    $a = mysqli_query($conn, "select * from likes where UserName='$name' and PostName='$x'");
                                    if (mysqli_num_rows($a) > 0) {
                                        $y = 'likedImg.png';
                                    } else {
                                        $y = 'likeImg.png';
                                    }
                            ?>

                                    <div class="post">
                                        <div class="post-top">
                                            <div class="post-info">
                                                <p class="name"><?php echo $row["UserName"]; ?></p>
                                            </div>
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                        <div class="post-content">

                                            <img src="uploads/<?php echo $row['fn']; ?>" name="img">

                                        </div>
                                        <div class="post-bottom">
                                            <div class="action">
                                                <?php echo "<form action='like.php' method='post'><input type='image' class='img' src='$y' name='submit'><label for='like' class='likes'>   {$row['likes']} Likes </label><input type='text' id='url' name='url' value='$x' style='visibility:hidden;'></form>"; ?>
                                            </div>
                                            <div class="action">
                                                <?php
                                                echo "<form action ='comments.php' method='post'><input type='image' src='comm.jfif' class='comment' name='submit' style='width:60px;top:'>Comments <input type='text' id='url' name='url' value='$x' style='visibility:hidden;'></form>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </div>
                    </section>
                    <div class="right" style="background:#30AEB3;" name="right" src="individual.php">
                        <h3>User Posts</h3>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'facebook1');

                        $sql = "select UserName,fn,likes from posts where UserName='$uname'";
                        $res = mysqli_query($conn, $sql);
                        if ($res->num_rows > 0) {
                            // output data of each row
                            while ($row = $res->fetch_assoc()) { ?>
                                <div class="post">
                                    <div class="post-top">
                                        <div class="post-info">
                                            <p class="name"><?php echo $row["UserName"]; ?></p>
                                        </div>
                                        <i class="fas fa-ellipsis-h"></i>
                                    </div>
                                    <div class="post-content">

                                        <img src="uploads/<?php echo $row['fn']; ?>" name="img">
                                    </div>
                                    <div class="post-bottom">
                                        <div class="action">
                                            <?php echo "<form action='like.php' method='post'><input type='image' class='img' src='$y' name='submit'><label for='like' class='likes'>   {$row['likes']} Likes </label><input type='text' id='url' name='url' value='$x' style='visibility:hidden;'></form>"; ?>
                                        </div>
                                        <div class="action">
                                            <?php
                                            echo "<form action ='comments.php' method='post'><input type='image' src='comm.jfif' class='comment' name='submit' style='width:60px;top:'>Comments <input type='text' id='url' name='url' value='$x' style='visibility:hidden;'></form>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }

                        ?>
                        <br>
                    </div>
                    <?php
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    if (isset($_FILES["image"])) {

                        $fn = $_FILES["image"]["name"];
                        $ft = $_FILES["image"]["type"];
                        $fs = $_FILES["image"]["size"];
                        $ftp = $_FILES["image"]["tmp_name"];
                        //echo "<img src='$target_file' style='width:240px; height:240px;'>";
                        if (!file_exists($target_file)) {

                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                echo "<br><h3>The file  has been uploaded.</h3>";
                            }

                            $con = mysqli_connect("localhost", "root", "", "faceBook1");
                            $st1 = "INSERT INTO posts (UserName,fn,ftp,ft,fs,likes) VALUES('$uname','$fn', '$ftp','$ft','$fs',0)";
                            //$st2 = "Insert into likes(PostName,UserName) values ('$fn','$uname')";
                            //$res2 = mysqli_query($con, $st2);
                            $res1 = mysqli_query($con, $st1);
                            if ($res1) {
                                echo "inserted file into database";
                            }
                        } else {
                            echo "<br><h3>sorry file exists</h3>";
                        }
                    }
                    ?>
                    <div class="grid-container">
                        <div class="grid-item">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'facebook1');
                            $sql = "select * from fb where UserName='$uname'";
                            $res = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_row($res);
                            echo "UserName : " . $row[0] . "<br>";
                            echo "Email : " . $row[1] . "<br>";
                            echo "DOB : " . $row[2] . "<br>"; ?>
                            <a href='logout.php' style="color:white;margin-top:-80px;align:center;"><input type="submit" value="Log Out" name="submit"></a></h3>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!>
        <footer style="text-align:center;">
            <span>Created By Likhi | <span class="far fa-copyright"></span> ©️ 2023 All rights reserved</span>
        </footer>

    </html>
<?php
} else {
    echo "<h1>Please Login first. </h1>";
}
?>