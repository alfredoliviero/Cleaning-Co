<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="index.php">HOME</a>
        <div class="search">
            <h1>LOGIN ADMIN</h1>
            <form action=# method=post>
                <input type="text" name=user placeholder="INSERT USER" required>
                <input type="password" name=psw placeholder="INSERT PASSWORD" required>
                    <input type="submit" value="login" name="adminLogin">
            </form>
        </div>
        <?php
            if(isset    ($_POST['user'])    &&  ($_POST['psw']) ){
                $host="localhost";
                $user="fredo";
                $psw="12345";
                $db="db_gstimpresapulizie";
                $connect=mysqli_connect($host,$user,$psw,$db);
                $adminLogin=$_POST['user'];

                    if ((($_POST['user'])=="admin")&&(($_POST['psw'])=="admin")){
                        session_start();
                        $_SESSION['log']=$adminLogin;
                        header("Location: admin.php");
                    }

                    mysqli_close($connect);
            }
        ?>
    </body>
</html>




