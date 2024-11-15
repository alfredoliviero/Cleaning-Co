<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
        <h1>SEARCH & MODIFY CLIENT</h1>
            <table>
                <tr>
                    <td>
                        <form action=# method="post">
                            <input type="text" name="cNameRic" placeholder="INSERT NAME">
                            <input type="text" name="cSurnameRic" placeholder="INSERT SURNAME">
                            <input type="text" name="cCfRic" placeholder="INSERT FISCAL CODE">
                                <input type="submit" value="CERCA">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>



<?php
if(isset($_POST["cNameRic"])&&($_POST["cSurnameRic"])&&($_POST["cCfRic"])){
    
                $host="localhost";
                $user="fredo";
                $psw="12345";
                $db="db_gstimpresapulizie";
                $cNameRic=$_POST["cNameRic"];                
                $cSurnameRic=$_POST["cSurnameRic"];
                $cCfRic=$_POST["cCfRic"];
                    
                    $connect=mysqli_connect($host,$user,$psw,$db);
                    $queryRicClient="SELECT nome_cliente,cognome_cliente,cf_cliente FROM cliente WHERE cliente.cf_cliente='$cCfRic'";
                    $resSet=mysqli_query($connect,$queryRicClient);
                        $find=false;
                        while($row=mysqli_fetch_array($resSet)) {
                            echo $row['nome_cliente'];
                            echo $row['cognome_cliente'];
                            echo $row['cf_cliente'];
                            $find=true;
                        }
                        if($find==false){
                            echo"alert(' ERROR NOT FIND ')";
                        }
                        mysqli_close($connect);
}
          echo"MODIFY CLIENT";
	echo "<form action=# method='post'>";
	  echo " <input type='text' name='cNameMod' placeholder='INSERT NAME'>";
            echo " <input type='text' name='cCognomeMod' placeholder='INSERT SURNAME'>";
            echo"<input type='text' name='cCf' placeholder='CONFIRM FISCAL CODE' required>";
            echo"<input type='submit'  value='MODIFY'>";
	 echo "</form>";
	 
	
   	
	  if(isset($_POST["cNameMod"])&&($_POST["cCognomeMod"])&&($_POST["cCf"])){
	   
           
                $host="localhost";
                $user="fredo";
                $psw="12345";
                $db="db_gstimpresapulizie";
             $cNomeMod=$_POST["cNameMod"];
           $cCognomeMod=$_POST["cCognomeMod"];
                $cCf=$_POST["cCf"];
                    
                    $connect=mysqli_connect($host,$user,$psw,$db);
	  
	   
	   $querymodifica="UPDATE cliente SET nome_cliente='$cNomeMod',cognome_cliente='$cCognomeMod' where cliente.cf_cliente='$cCf'";
	   if(mysqli_query($connect,$querymodifica)){
            echo "<script>alert(' SUCCESSFULLY MODIFIED ')</script>";
           
	   }

       mysqli_close($connect);
        }
?>