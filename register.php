<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900%display=swap');
        
*
{
    font-family: 'Poppins', 'sans-serif';
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #23242a;
    background-image: url("https://t4.ftcdn.net/jpg/05/68/02/71/240_F_568027157_i6UMHoIwEGLni3OJOAKIvp5ZPlw8CNVB.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
.box {
    position: relative;
    border-radius: 8px;
    width: 400px;
    height: 650px;
    background: #1c1c1c;
    overflow: hidden;
}

.form h2 {
    color: #45f3ff;
    font-weight: 500;
    text-align: center;
    letter-spacing: 0,1em;

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
.box::before{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, 
    #45f4ff, #45f4ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
}

.box::after{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, 
    #45f4ff, #45f4ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -3s;
}
.inputBox{
    position: relative;
    width: 300px;
    margin-top: 35px;

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

.inputBox span{
    position: absolute;
    left: 0;
    padding: 10px 10px 10px;
    font-size: 1em;
    color: #8f8f8f;
    pointer-events: none;
    letter-spacing: 0.05em;
    transition: 0.5s;
}

.inputBox input:valid ~ span, 
.inputBox input:focus ~ span  {
    color: #45f3ff;
    transform: translateX(0px) translateY(-34px);
    font-size: 0.75em;

}

.inputBox i {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background: #45f3ff;
    border-radius: 4px;
    transition: 0.5s;
    pointer-events: none;
    z-index: 9;
}

.inputBox input:valid ~ i, 
.inputBox input:focus ~ i {
    height: 44px;

}
input[type='submit'] {
    border: none;
    outline: none;
    align:center;
    align-items:center;
    background: #45f3ff;
    padding: 11px 25px;
    width: 200px;
    margin-top: 10px;
    border-radius: 4px;
    font-weight: 600;
    cursor: pointer;
}
input[type='submit']:hover {
    background:#28292d;
    color:#45f3ff;
    outline:2px solid #45f3ff;
    opacity: 0.8;
}
input[type='submit']:active {
    opacity: 0.8;
}
.links a {
    margin: 10px 20px 10px 0;
    font-size: 0.95em;
    color: grey;
    text-decoration: none;
    text-align:center;
}

.links a:hover,
.links a:active
 {
    color: #45f3ff;
}
@keyframes animate {
    0%{
        transform: rotate(0deg);
    }
    100%{
        transform: rotate(360deg);
    }
}
</style>
<body>
        <div class="box">
            <div class="form">
                <form method="POST" action="db_connec.php">
                    <h2>Create New Account</h2>
                    <tr><td>
                <div class="inputBox">
                    <input type="text" name="uname" required="required">
                    <span>Username</span>
                    <i></i>
                </div></td></tr>
                <tr><td>
                <div class="inputBox">
                    <input type="email" name="email" required="required">
                    <span>Email address</span>
                    <i></i>
                </div></td></tr>
                <tr><td>
                <div class="inputBox">
                    <input type="date" name="dob" required="required">
                    <span>Date Of Birth</span>
                    <i></i>
                </div></td></tr>
                <tr>
                <td>
                    <br><br>
                    <label for="gen" style="color:#45f3ff;">Gender:</label>
                <label for="male" style="margin-left: 10px;color: grey">Male:</label>
		<input id="male" type="radio" name="gen" value="male">
		<label for="female" style="margin-left: 10px;color: grey">Female:</label>
		<input id="female" type="radio" name="gen" value="female">
	        </td>
                </tr>
                <tr><td>
                <div class="inputBox">
                    <input type="password" name="pwd" required="required">
                    <span>Password</span>
                    <i></i>
                </div></td></tr><br><br>
                <tr><td>
                    <input type="checkbox" style="color:#45f3ff"required >Agree to our T&C.
                </td></tr>
                <tr><td>
                    <div class="inputBox">
                        <a href="finalOgin.php"><input type="submit" value="Sign Up" name="submit"></a>
                    </div></tr></td>
                </form><br><br>
                <div class="links">
                    <a href="finalOgin.php">Already Have an Account?</a>
                </div>
            </div>
        </div>
</body>
</html>