<html>
    <head>   
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="index.php">HOME</a>
    <div>
    <h1>LOGIN CLIENT</h1>
        <form action=# method="post">
            <input type="text" name=user placeholder="INSERT USER" required>
            <input type="password" name=psw placeholder="INSERT PASSWORD" required>
                <input type="submit" name="userLogin" value="login">
        </form>
    </div>
        <?php
            if(isset($_POST['user'])&&($_POST['psw'])){
                $host="localhost";
                $user="fredo";
                $psw="12345";
                $db="db_gstimpresapulizie";
                $connect=mysqli_connect($host,$user,$psw,$db);
                $userlogin=$_POST['user'];
                $pswlogin=$_POST['psw'];

                    $Login="SELECT cf_cliente, psw_cliente AS cf_totali FROM cliente WHERE cliente.cf_cliente='$userlogin' AND cliente.psw_cliente='$pswlogin'";
                    $ResLogin=mysqli_query($connect,$Login);
                    $row=mysqli_fetch_array($ResLogin);
                        if($row['cf_totali']==null){
                            echo "<script>alert('incorrect username or password')</script>";
                        } else{
                            session_start();
                            $_SESSION['log']=$row['cf_cliente'];
                            header("Location: clienti.php");
                        }
                        mysqli_close($connect);
                }
        ?>

    </body>
</html>
