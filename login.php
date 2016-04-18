
<?php include("Header.php")?>

        <center>
            <form class="login" style="margin-top: 50px" method="post" action="login_handler.php">
            <table border="1">
            <tr>
                <td style="color:white">Username</td>
                <td><input type="text" name="userid">
            </tr>
            <tr>
                <td style="color:white">Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></>
                <td align="center"><input type="submit" value="Log in"/>
            </tr>
            </table>
        </form>
            <br>
            <form class="login" action="register.php"><p>No account yet? Sign up!</p>
                <p><input type="submit" value="Sign up"></p>
            </form>
        </center>

<?php include("Footer.php")?>

