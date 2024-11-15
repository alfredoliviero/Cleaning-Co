<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
          <h1>CREATE OPERATOR</h1>
            <form action=# method="post">
                <input  type=text name=nomeOpIns placeholder="INSERT NAME"><br>
                <input  type=text name=CognomeOpIns placeholder="INSERT SURNAME"><br>
                <input  type=text name=cfOpIns placeholder="INSERT FISCAL CODE"><br>
                    <input class="button" type=submit value=CREATE>
            </form>
        </div>
    </body>
</html>





<?php 
if(isset($_POST["nomeOpIns"])&&($_POST["CognomeOpIns"])&&($_POST["cfOpIns"]))
{
  $nomeOp=$_POST["nomeOpIns"];
  $CognomeOp=$_POST["CognomeOpIns"];
  $cfOp=$_POST["cfOpIns"];
  

                $host="localhost";
                $user="fredo";
                $psw="12345";
                $db="db_gstimpresapulizie";
                $connect=mysqli_connect($host,$user,$psw,$db);
       
         echo "CONNESSO";
         echo "<br>";
         $querycontrollo="SELECT COUNT(cf_operaio) AS Totalicf FROM operai WHERE operai.cf_operaio='$cfOp'";
         $duplicati='Totalicf';
    
           if($duplicati==1)
           {
             echo "CODICE FISCALE GIA' ESISTENTE";
           }
             if($duplicati>1)
             {
                $querydaeseguire="INSERT INTO operai (nome_operaio,cognome_operaio,cf_operaio) VALUES ('$nomeOp','$CognomeOp','$cfOp')";
                if($resOpIns=mysqli_query($connect,$querydaeseguire))
                {
                 echo "DIPENDENTE INSERITO";
                }
                 
             }
             mysqli_close($connect);  
}
?>  