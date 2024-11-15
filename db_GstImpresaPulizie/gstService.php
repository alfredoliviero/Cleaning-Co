<html>
<head>
<link href="millestili.css" rel="stylesheet">
    <title>CLEANME!</title>
   
</head>
<body>
<a href="admin.php">HOME</a>
    <div class="container">
        <h1>CREATE SERVICE</h1>
        
        <form action="#" method="post">
                <input type="text" name="id_servizio"  hidden >
				<input type="text" name="descrizione_servizio" placeholder="SERVICE NAME" required><br><br>
                <input type="number" min="0" name="prezzo_servizio" placeholder="SERVICE PRICE" required><br><br>
				    <input type=submit value="CREATE" name="insert">
        </form>
        
    </div>
    
<?php
if(isset($_POST["insert"])){
    $idServizio=$_POST['id_servizio'];
    $descrizioneServizio=$_POST['descrizione_servizio'];
    $prezzoServizio=$_POST['prezzo_servizio'];
    $host="localhost";
    $user="fredo";
    $psw="12345";
    $db="db_gstimpresapulizie";
        $connect=mysqli_connect($host,$user,$psw,$db);

            $sqlInsertService="INSERT INTO servizio (id_servizio,descrizione_servizio,prezzo_servizio) VALUES ('$idServizio','$descrizioneServizio','$prezzoServizio')";
                $res=mysqli_query($connect,$sqlInsertService);
                if($res){
                    echo"<script>alert('aggiunto servizio!')</script>";
                }
        mysqli_close($connect);

 
}

?>
</body>
</html>


