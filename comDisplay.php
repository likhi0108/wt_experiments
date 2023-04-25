<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location:wlcm.php");
}
$url = $_SESSION['addr'];
$name = $_SESSION['uname'];
$conn = mysqli_connect('localhost', 'root', '', 'facebook1');
?>
<html>

<head>
    <link rel="stylesheet" href="fstyle.css">
</head>
<style>
    .message {
        margin-left: 15px;
        padding: 5px;
        background-color: #30AEB3;
        height: 60px;
        width: 500px;
        border-radius: 10px;
    }

    .posts {
        display: flex;
        flex-direction: column;
        gap: 1em;
    }

    .sender {
        color: solid black;
        font-size: 15px;
        padding: 1px;
    }

    .msg {
        color: black;
        font-size: 13px;
        padding: 1px;
    }

    .post {
        background-color: white;
        width: fit-content;
    }

    .type {
        padding: 10px;
        margin: 6px;
    }
</style>
<body>
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
                <div class="right" style="background:#30AEB3;" name="right">
                    <div class="posts">
                        <?php
                        $res = mysqli_query($conn, "select * from posts where fn='$url'");
                        $i = mysqli_fetch_assoc($res);
                        $like = $i['likes'];
                        $user = $i['UserName']; ?>
                        <div class="post">
                            <div class="post-top">
                                <div class="post-info">
                                    <p class="name"><?php echo "{$user}"; ?></p>
                                </div>
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="post-content">
                                <img src="uploads/<?php echo $url; ?>" name="img">
                                <?php echo "<br><label for='like' class='likes'><img src='likedImg.png' style='height:40px;width:40px;'>:{$like} Likes </label><br>"; ?>
                            </div>
                        </div>
                        <?php
                        $res = mysqli_query($conn, "select * from comment where PostName='$url' ");
                        if (mysqli_num_rows($res) > 0) {
                            while ($i = mysqli_fetch_assoc($res)) { ?>
                                <div class="message">
                                    <?php echo "<br><label class='sender'>{$i['UserName']} commented :</label><br>"; ?>
                                    <?php echo "<label class='msg'>{$i['msg']}</label>"; ?>
                                </div>
                        <?php }
                        } ?>
                        <div class='type'>
                            <form action="comInsert.php" method="post">
                                <input type="text" class="inp" name="msg" placeholder="Comment here...." style="padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
                                <input type="submit" name="comment" class="button2" value="Comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                    <a href='wlcm.php' style="color:white;margin-top:-80px;align:center;"><input type="submit" value="HomePage" name="submit"></a></h3>
                </div>
            </div>
        </div>
    </div>
    <footer style="text-align:center;">
        <span>Created By Likhi | <span class="far fa-copyright"></span> ©️ 2023 All rights reserved</span>
    </footer>
</body>

</html>