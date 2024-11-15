<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
            <h1>DELETE CLIENT</h1>
            <table>
                <tr>
                    <td>
                        <form action=# method=post>
                            <input type="text" name="cNameDelete" placeholder="INSERT NAME">
                            <input type="text" name="cSurnameDelete" placeholder="INSERT SURNAME">
                            <input type="text" name="cCfDelete" placeholder="INSERT FISCAL CODE" required>
                                <input type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>

<?php
if(isset($_POST["cNameDelete"])&&($_POST["cSurnameDelete"])&&($_POST["cCfDelete"])){
            $host="localhost";
            $user="fredo";
            $psw="12345";
            $db="db_gstimpresapulizie";
            $cNameDelete=$_POST["cNameDelete"];                
            $cSurnameDelete=$_POST["cSurnameDelete"];
            $cCfDelete=$_POST["cCfDelete"];
            
                $connect=mysqli_connect($host,$user,$psw,$db);
    
                $sql="DELETE FROM cliente WHERE cliente.cf_cliente='$cCfDelete'";
                  if($risOpDel=mysqli_query($connect,$sql)){
                    echo "<script>alert(' SUCCESSFULLY DELETED ')</script>";
                    }else{
                        echo "<script>alert(' ERROR NOT FIND ')</script>";
                    }
                    mysqli_close($connect); 
}
?>