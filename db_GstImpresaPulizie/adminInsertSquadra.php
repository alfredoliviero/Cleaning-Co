<html>
    <head>
        <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
        <h1>CREATE A SQUAD</h1>
            <form action=# method=POST>
                <input type="text" name="nomeSquadra" placeholder="INSERT NAME" required>
                <br><br>
                <label for="date">AVAILABILITY</label>
                <input type="date" name="DateOp" required>
                    <input type="submit" name="insert" value="INSERISCI">
                
            </form>
        </div>
    </body>
</html>



<?php
if(isset($_POST["insert"])){
    $dateOp=$_POST['DateOp'];
    $nomeSquad=$_POST['nomeSquadra'];
    
    $host="localhost";
    $user="fredo";
    $psw="12345";
    $db="db_gstimpresapulizie";
        $connect=mysqli_connect($host,$user,$psw,$db);
        $sqlSquadInsert="INSERT INTO squadra (id_squadra,nome_squadra,giornoOperativ) VALUES ('','$nomeSquad','$dateOp')";
            $ris=mysqli_query($connect,$sqlSquadInsert);   
                $querySelectMax="SELECT MAX(id_squadra) AS IndiceMassimo FROM squadra";
                $res=mysqli_query($connect,$querySelectMax);
                $row=mysqli_fetch_array($res);
                $CodSquadra=$row['IndiceMassimo'];
                    session_start();
                    $_SESSION['CodSquadra']=$CodSquadra;
                    header('Location:adminInsertSquadraDue.php');
                    mysqli_close($connect); 
}
?>