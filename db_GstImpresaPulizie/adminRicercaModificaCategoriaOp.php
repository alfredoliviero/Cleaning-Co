<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
    <title>CLEANME!</title>
   
</head>
<body>
    <a href="admin.php">HOME</a>
    <div>
    <h1>SEARCH & MODIFY CATEGORY</h1>
        <form action=# method="post">
            <input type="text" name="nomeCatOp_Ric" placeholder="INSERT NAME">
            <input type="submit" value="SEARCH">
        </form>
    <div>
</body>

</html>


<?php
                                 if(isset($_POST['nomeCatOp_Ric'])){
                                     $host="localhost";
                                $user="fredo";
                                $psw="12345";
                                $db="db_gstimpresapulizie";
                                $connect=mysqli_connect($host,$user,$psw,$db);
                                
                                $nomeCatOp_Ric=$_POST['nomeCatOp_Ric'];
                                 $queryFind="SELECT * FROM categoria_operai WHERE nome_categoria='$nomeCatOp_Ric'";
                                        
                                        $resultset=mysqli_query($connect,$queryFind);
                                        $catTrovata=false;
                                        while($riga=mysqli_fetch_array($resultset)){

                                    echo "  ID:   ";
                                        echo $riga['id_categoria'];
                                    echo "<br>NAME: ";
                                        echo $riga['nome_categoria'];
                                    echo "<br>SALARY:   ";
                                        echo $riga['stipendio_categoria'];
                                     $catTrovata=true;

                                        }
                                      if($catTrovata==false){
                                        echo"<script>alert('CATEGORY NOT FIND')</script>";
                                      }
                                      
                                    echo"<br>MODIFY CATEGORY<br>";
                                echo"<input type='text' name='nomeCatOp_Mod' placeholder='MODIFY NAME'>";
                               echo"<input type='text' name='stipendioCatOp_Mod' placeholder='MODIFY SALARY'>";
                               echo"<input type='submit' value='MODIFY'>";
                                
                            if(isset($_POST['nomeCatOp_Mod'])&&($_POST['stipendioCatOp_Mod'])){
                                $host="localhost";
                                $user="fredo";
                                $psw="12345";
                                $db="db_gstimpresapulizie";
                    
                                                
                                $nomeCatOp_Mod=$_POST['nomeCatOp_Mod'];                
                                $stipendioCatOp_Mod=$_POST['stipendioCatOp_Mod'];
                                
                                      $connect=mysqli_connect($host,$user,$psw,$db);
                                        $queryUpdate="UPDATE categoria_operai SET nome_categoria='$nomeCatOp_Mod' ,stipendio_categoria='$stipendioCatOp_Mod' WHERE nome_categoria='$nomeCatOp_Ric'";
                                            if($resMod=mysqli_query($connect,$queryUpdate)){
                                                echo "CATEGORIA MODIFICATA";
                                            }else{
                                                echo "ERRORE MODIFICA CATEGORIA";
                                                 }
                                               
                                               
                                                 mysqli_close($connect);          
                            } 
                            mysqli_close($connect);             
                        }
?>
