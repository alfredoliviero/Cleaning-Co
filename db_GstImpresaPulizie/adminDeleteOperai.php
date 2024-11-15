<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
            <h1>DELETE OPERATOR</h1>
            <form action=# method="post">
                <input type=text name=cfDel placeholder="INSERT FISCAL CODE">
                    <input class="button" type=submit value=DELETE>
            </form>
        </div>
    </body>
</html>



<?php
            if(isset($_POST["cfDel"]))
            {
            $cfDel=$_POST["cfDel"];
            
                            $host="localhost";
                            $user="fredo";
                            $psw="12345";
                            $db="db_gstimpresapulizie";
                            $connect=mysqli_connect($host,$user,$psw,$db);
              
               
                $queryOpDel="DELETE FROM operai WHERE operai.cf_operaio='$cfDel'";
                                            if($risOpDel=mysqli_query($connect,$queryOpDel)){
                                                echo"op cancellato";
                                            }
                                            
                                            mysqli_close($connect);
            } 
            ?>