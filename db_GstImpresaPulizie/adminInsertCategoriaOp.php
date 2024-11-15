<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
    <title>CLEANME!</title>
   
</head>
<body>
<a href="admin.php">HOME</a>
        <div>
            <h1>INSERT CATEGORY </h1>
            <form action=# method="post">
                <input type="text" name="nomeCat_operatore" placeholder="INSERT NAME">
                <input type="text" name="stipendioCat_operatore" placeholder="INSERT SALARY">
                    <input type="submit" value="CREATE">       
            </form>
        </div>
    </body>
</html>

<?php
if(isset($_POST['nomeCat_operatore'])&&($_POST['stipendioCat_operatore'])) //inserimento
{
    $host="localhost";
    $user="fredo";
    $psw="12345";
    $db="db_gstimpresapulizie";
    $connect=mysqli_connect($host,$user,$psw,$db);
    $nomeCatOp=$_POST['nomeCat_operatore'];
    $stipendioCatOp=$_POST['stipendioCat_operatore'];
    
    
    
        
            $queryInsert="INSERT INTO categoria_operai(nome_categoria,stipendio_categoria) VALUES ('$nomeCatOp','$stipendioCatOp')";
                if($resInsert=mysqli_query($connect,$queryInsert)){
                    echo "CATEGORIA INSERITO CORRETTAMENTE!";
                    }   else{
                        echo "ERRORE!";
                            }
                            mysqli_close($connect);
}
?>