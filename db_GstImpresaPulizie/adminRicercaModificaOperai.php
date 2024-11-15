<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
            <h1>SEARCH & MODIFY OPERATOR</h1>
            <form action=# method="post">
            <input type=text name=cfOpRic placeholder="INSERT FISCAL CODE">
                <input class='button' type=submit value=FIND>
            </form>
        </div>
    </body>
</html>



<?php
        if(isset($_POST['cfOpRic']))
        {
          $cfOpRic=$_POST['cfOpRic'];
        
                        $host="localhost";
                        $user="fredo";
                        $psw="12345";
                        $db="db_gstimpresapulizie";
                        $connect=mysqli_connect($host,$user,$psw,$db);
        
          $queryDaEseguire="SELECT nome_operaio,cognome_operaio,cf_operaio FROM operai WHERE operai.cf_operaio='$cfOpRic'";
          $ResultSet=mysqli_query($connect,$queryDaEseguire);
                                  while($riga=mysqli_fetch_array($ResultSet))
                                 {
                                    echo $riga['nome_operaio'];
                                    echo $riga['cognome_operaio'];
                                    echo $riga['cf_operaio'];

                                 }
                                 echo"<h2>MODIFY OPERATOR</h2>";
                            echo" <input type='text' name='nomeOpMod' placeholder='MODIFY NAME'>";
                           echo"<input  type='text' name='CognomeOpMod' placeholder='MODIFY SURNAME'>";
                            echo" <input  type='text' name='cfOpMod' placeholder='MODIFY FISCAL CODE'>";
                            echo"<input  type='submit' value='MODIFY'>";
                                 echo"<form action='#' method='post'>"; 
                            if(isset($_POST['nomeOpMod'])&&($_POST['CognomeOpMod'])&&($_POST['cfOpMod'])&&($_POST['cfOpRic'])){
                               $NewNomeOp=$_POST["nomeOpMod"];
                                   $NewCognomeOp=$_POST["CognomeOpMod"];
                                   $NewCfOp=$_POST["cfOpMod"];
                                   $cfOpRic=$_POST['cfOpRic'];
	
                            $querymodifica="UPDATE operai SET nome_operaio='$NewNomeOp',cognome_operaio='$NewCognomeOp',cf_operaio='$NewCfOp' ";
                       
                         if($resUpdOp=mysqli_query($connect,$querymodifica))
                        {
                            echo "<script>alert(' SUCCESSFULLY MODIFIED ')</script>";
                        }
                
                }
                	echo"</form>";
                    mysqli_close($connect); 
        }
        
        ?>