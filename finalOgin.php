<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900%display=swap');

        * {
            font-family: 'Poppins', 'sans-serif';
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #23242a;
            background-image: url("https://t3.ftcdn.net/jpg/03/69/86/06/240_F_369860688_NUaxDrPpP4PxKExNr3E0nglM8yqRlqSy.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .box {
            position: relative;
            width: 380px;
            height: 420px;
            border-radius: 8px;
            background: #1c1c1c;
            overflow: hidden;
        }

        .form h2,h4 {
            color: #DBC058;
            font-weight: 500;
            text-align: center;
            letter-spacing: 0, 1em;

        }

        .form {
            position: absolute;
            inset: 2px;
            border-radius: 8px;
            background: #28292d;
            z-index: 10;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;

        }

        .box::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 420px;
            background: linear-gradient(0deg, transparent,
                    #DBC058, #DBC058);
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
        }

        .box::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 420px;
            background: linear-gradient(0deg, transparent,
                    #DBC058, #DBC058);
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
            animation-delay: -3s;
        }

        .inputBox {
            position: relative;
            width: 300px;
            margin-top: 35px;

        }

        .links {
            display: flex;
            justify-content: space-between;

        }

        .links a {
            margin: 10px 0;
            font-size: 00.95em;
            color: #8f8f8f;
            text-decoration: none;
        }

        .links a:hover,
        .links a:nth-child(2) {
            color: #DBC058;

        }

        .inputBox input {
            position: relative;
            width: 100%;
            padding: 10px 9px 10px;
            background: transparent;
            border: none;
            outline: none;
            color: #23242a;
            font-size: 1em;
            letter-spacing: 0.05em;
            z-index: 10;
        }

        .inputBox span {
            position: absolute;
            left: 0;
            padding: 10px 10px 10px;
            font-size: 1em;
            color: #8f8f8f;
            pointer-events: none;
            letter-spacing: 0.05em;
            transition: 0.5s;
        }

        .inputBox input:valid~span,
        .inputBox input:focus~span {
            color: #DBC058;
            transform: translateX(0px) translateY(-34px);
            font-size: 0.75em;

        }

        .inputBox i {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #DBC058;
            border-radius: 4px;
            transition: 0.5s;
            pointer-events: none;
            z-index: 9;
        }

        .inputBox input:valid~i,
        .inputBox input:focus~i {
            height: 44px;

        }

        input[type='submit'] {
            border: none;
            outline: none;
            align: center;
            background: #DBC058;
            padding: 11px 25px;
            width: 100px;
            margin-top: 10px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
        }

        input[type='submit']:active {
            opacity: 0.8;
        }

        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

<body>
    <div class="box">
        <div class="form">
            <form method="POST">
                <h2>MetaBook</h2><br>
                <h4>Login Here</h4>
                <tr>
                    <td>
                        <div class="inputBox">
                            <input type="text" name="uname" required="required">
                            <span>Username</span>
                            <i></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="inputBox">
                            <input type="password" name="pwd" required="required">
                            <span>Password</span>
                            <i></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="links">
                            <a href="#">Forgot password?</a>
                            <a href="register.php">Sign Up</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>

                        <div class="inputBox">
                            <a href="finalOgin.php"><input type="submit" value="Login" name="submit"></a>
                        </div>
                </tr>
                </td>
            </form>
        </div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["uname"];
        $pwd = $_POST["pwd"];
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'facebook1';

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if ($conn) {
            echo "Connection successful.";
        } else {
            echo "Connection Failed.";
            die("Connection Failed:" . mysqli_connect_error());
        }
        $sql = "select * from fb where UserName='$uname' and pwd='$pwd'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $_SESSION['uname'] = $uname;
            echo ("Welcome user"); ?>
            <script>
                window.location.href = "wlcm.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("InValid Login!");
                window.location.href = "finalOgin.php";
            </script>
    <?php
        }
    }
    ?>
</body>

</html>