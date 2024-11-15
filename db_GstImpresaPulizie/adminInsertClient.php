<html>
    <head>
    <link href="millestili.css" rel="stylesheet">
    
        <title>CLEANME!</title>
    </head>
    <body>
    <a href="admin.php">HOME</a>
        <div>
            <h1>INSERT CLIENT</h1>
            <table>
                <tr>
                    <td>
                        <div>
                        <form  action=# method="post">
                            <br>
                            <input type="text" name="cNameInsert" placeholder="INSERT NAME" required>
                            <br>
                            <input type="text" name="cSurnameInsert" placeholder="INSERT SURNAME" required>
                            <br>
                            <input type="text" name="cCfInsert" placeholder="INSERT FISCAL CODE" required>
                            <br>
                            <input type="password" name="cPswInsert" placeholder="INSERT PASSWORD" required>
                                <h2>OFFICE</h2>
                            <input type="text" name="cViaSede" placeholder="INSERT ADDRESS"required>
                                <input type="number" min="0" max="99999" name="cCapSede" placeholder="CAP" required>
                                <input type="text" name="cCittaSede" placeholder="INSERT CITY" required>
                                <input type="number" min="-5" max="99" name="cPianoSede" placeholder="FLOOR" required>
                                <input  type="text" name="cInternoSede" placeholder="INSERT INTERN" required>
                                    <input class="btn-submit" type="submit" value="INSERT">
                        </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        
        
        
        
    </body>
</html>


<?php
if(isset($_POST["cNameInsert"])&&($_POST["cSurnameInsert"])&&($_POST["cCfInsert"])&&($_POST["cPswInsert"])&&($_POST["cCapSede"])&&($_POST["cCittaSede"])&&($_POST["cPianoSede"])&&($_POST["cInternoSede"])&&($_POST["cViaSede"])){
        $host="localhost";
        $user="fredo";
        $psw="12345";
        $db="db_gstimpresapulizie";
        $connect=mysqli_connect($host,$user,$psw,$db);
            
            $cNameInsert=$_POST["cNameInsert"];
            $cSurnameInsert=$_POST["cSurnameInsert"];
            $cCfInsert=$_POST["cCfInsert"];
            $cPswInsert=$_POST["cPswInsert"];
            $cCapSede=$_POST["cCapSede"];    
            $cCittaSede=$_POST["cCittaSede"];
            $cPianoSede=$_POST["cPianoSede"];
            $cInternoSede=$_POST["cInternoSede"];
            $cViaSede=$_POST["cViaSede"];
            
            $duplicati='duplicati';
                $queryControlClient="SELECT COUNT (cf_cliente) AS duplicati FROM cliente WHERE cliente.cf_cliente='$cCfInsert'";
                
                if($duplicati==1){
                    echo"CLIENTE GIA PRESENTE!";
                    }   
                if($duplicati>1){
                    $queryInsertClient="INSERT INTO cliente (nome_cliente,cognome_cliente,cf_cliente,user_cliente,psw_cliente) VALUES ('$cNameInsert','$cSurnameInsert','$cCfInsert','$cCfInsert','$cPswInsert')";
                        $queryInsertSede="INSERT INTO indirizzo_sede (capSede,cittaSede,viaSede,pianoSede,internoSede,cf_cliente) VALUES ('$cCapSede','$cCittaSede','$cViaSede','$cPianoSede','$cInternoSede','$cCfInsert')";
                    
                   
                     if($risInsClient=mysqli_query($connect,$queryInsertClient)){
                            echo"CLIENTE INSERITO CON SUCCESSO!";
                             if($risInsSede=mysqli_query($connect,$queryInsertSede)){
                       echo"SEDE ASSOCIATA"; 
                            }
                    }
                }
                mysqli_close($connect);
}
?>