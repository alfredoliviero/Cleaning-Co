<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div class="box">
            <h1>CREATE NEW ORDER</h1>
            <table>
                <tr>
                    <td>
                        <form action=# method=post>
                             <?php
                                $host="localhost";
                                $user="fredo";
                                $psw="12345";
                                $db="db_gstimpresapulizie";
                                $connect=mysqli_connect($host,$user,$psw,$db);
        
                     //SELECTION squad
                        $querySlect="SELECT * FROM squadra";
                        $resSel=mysqli_query($connect,$querySlect);
                            echo"<select>";
                            echo"<option value=''disabled selected >SQUAD</option>";
                            while($row=mysqli_fetch_array($resSel)){
                                $id=$row['id_squadra'];
                                $nomeSquad=$row['nome_squadra'];
                                
                                echo"<option value=$id>$nomeSquad</option>";
                                }
                            echo"</select>";
                
                    //SELECTION SEDE
                    
                    $querySearch="SELECT * FROM indirizzo_sede ";
                    $resSearch=mysqli_query($connect,$querySearch);
                    
                        echo"<select>";
                        echo"<option value=''disabled selected >ADDRESS</option>";

                        while($row=mysqli_fetch_array($resSearch)){
                            $IndSede=$row['viaSede'];
                            echo"<option value=''>$IndSede</option>";
                            }
                        echo"</select>";
                
                    //DATA PREORDER 1
                    echo"<input type='date' name='data_prenotazione'>";
                       
                  
                    //CHECKBOX ORDINI
                    /*
                   // Connessione al database e query per ottenere i servizi
$queryCheck = "SELECT * FROM servizio";
$resCheck = mysqli_query($connect, $queryCheck);

// Verifica che ci siano risultati dalla query
if (mysqli_num_rows($resCheck) > 0) {
    // Ciclo per mostrare tutte le checkbox
    while ($row = mysqli_fetch_array($resCheck)) {
        $idService = htmlspecialchars($row['id_servizio']); // Escapare l'ID per sicurezza
        $nomeService = htmlspecialchars($row['descrizione_servizio']); // Escapare il nome del servizio per sicurezza

        // Mostra la checkbox con un name come array (services[]), in modo che vengano inviati più valori
        echo "<br>";
        echo "<input type='checkbox' name='services[]' value='$idService' /> $nomeService <br/>";
    }
} else {
    echo "<script>alert('Nessun servizio trovato')</script>";
}
*/
echo"<h2>SELECT SERVICE</h2>";
$queryCheck="SELECT * FROM servizio";
$resCheck=mysqli_query($connect,$queryCheck);
    
    while($row=mysqli_fetch_array($resCheck)){
        $idService=$row['id_servizio'];
        $nomeService=$row['descrizione_servizio'];
    echo"<input type='checkbox' name=$idService >$nomeService    ";

    }
            
    if(isset($_POST['data_prenotazione'])){
        if($dataPreOrder=$_POST['data_prenotazione']){
            echo "<br><h4>THE SERVICE IS BOOKED ON: </h4>";
            echo $_POST['data_prenotazione'];
    }
}

mysqli_close($connect);
                ?>
            </table>
            <input type="submit" name="orderConfirm" value="INVIA ORDINE">

            
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            </form>
        </div>
    </body>
</html>




