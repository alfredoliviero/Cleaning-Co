<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
    <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <h1>FIND SQUAD</h1>
        <div>
            <form action=# method="post">
                <input type="text" name="idFindSquad" placeholder="ID SQUAD">
                <input type="submit" value="FIND">
            </form>

<?php
    if(isset($_POST['idFindSquad'])){
        
        $idRicerca=$_POST['idFindSquad'];
        
            $host="localhost";
            $user="fredo";
            $psw="12345";
            $db="db_gstimpresapulizie";
                $connect=mysqli_connect($host,$user,$psw,$db);
                            
                            echo"<br>OPERAI ASSOCIATI";
                        $sql="SELECT * FROM squadra INNER JOIN formazione_squadra ON squadra.id_squadra=formazione_squadra.id_squadra  WHERE formazione_squadra.id_squadra='$idRicerca'";
                        $resultSet=mysqli_query($connect,$sql);
                        while($row=mysqli_fetch_array($resultSet)){
                            echo"<br>";
                                    echo $row['id_squadra'];
                                echo"<br>";
                                
                                echo"";
                                    echo $row['cf_operaio'].''."<input type='submit' name='cancella' value='-'>";
                                
                        }
                        
                        
                        /*rendi gli operatori diponibili E inseriscili nella squadra 
                        $selectOperativita=$_POST['selectOperativita'];
                        $selectCfOperaio=$_POST['cfOperaio'];
                        $sqlOpAssModOperativo="UPDATE operai  SET operativita='$selectOperativita' WHERE operai.cf_operaio='$selectCfOperaio' ";
                        $sql
                    
                        //   echo"<br>OPERAI DIPONIBILI NELLA SQUADRA<br>";
                        
                        echo"<form action='#' method='post'>";
                            echo"<input type='text' name='cfOperaio' placeholder='INSERISCI IL CF'>";
                            echo"<input type='number' min='0' max='1' name='selectOperativita' placeholder='AGGIUNGI ALLA SQUADRA'>";
                            echo"<input type='submit' values='+/-'>";
                        echo"</form>";
                        */
                        
                        echo"<br>OPERAI DISPONIBILI SENZA SQUADRA <br>";
                        $sqlnonoperativi="SELECT * FROM operai WHERE operai.operativita='0'";
                            $resultSetOperativita=mysqli_query($connect,$sqlnonoperativi);
                            while($riga=mysqli_fetch_array($resultSetOperativita)){
                                echo $riga['nome_operaio'];
                                echo $riga['cognome_operaio'];
                                echo $riga['cf_operaio'];
                            }
                            
                        
                            mysqli_close($connect);               
    }     
?>
        </div>
    </body>
</html>

