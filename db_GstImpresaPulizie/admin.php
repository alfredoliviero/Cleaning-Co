<html>
<head>
    <link href="millestili.css" rel="stylesheet">
    <title>CLEANME!</title>
</head>
<body>
    <div class="header">
       <img  src="Hands - Show.png">
        <h1>CLEANME!</h1>
        <h3>cleaning co.</h3>
    </div>
    <div class="container">
        
        
        <div class="box">
            <h2>CLIENT</h2>
        
            <table>
                <tr>
                    <td><a href="adminInsertClient.php">INSERT CLIENT</a></td>
                </tr>
                <tr>
                    <td><a href="adminRicercaCliente.php">SEARCH & MODIFY CLIENT</a></td>
                </tr>
                <tr>
                    <td><a href="adminDeleteCliente.php">DELETE CLIENT</a></td>
                </tr>
            </table>
        </div>
        <div class="box">
            <h2>SQUAD</h2>
            <table>
                <tr>
                    <td><a href="adminInsertSquadra.php">INSERT SQUAD</a></td>
                </tr>
                <tr>
                    <td><a href="adminRicercaSquadra.php">SEARCH SQUAD</a></td>
                </tr>
            </table>
        </div>
        <div class="box">
            <h2>CATEGORY</h2>
            <table>
                <tr>
                    <td><a href="adminInsertCategoriaOp.php">INSERT CATEGORY</a></td>
                </tr>
                <tr>
                    <td><a href="adminRicercaModificaCategoriaOp.php">SEARCH & MODIFY CATEGORY</a></td>
                </tr>
            </table>
        </div>
        <div class="box">
            <h2>OPERATOR</h2>
            <table>
                <tr>
                    <td><a href="adminInsertOperai.php">CREATE OPERATOR</a></td>
                </tr>
                <tr>
                    <td><a href="adminRicercaModificaOperai.php">SEARCH & MODIFY OPERATOR</a></td>
                </tr>
                <tr>
                    <td><a href="adminDeleteOperai.php">DELETE OPERATOR</a></td>
                </tr>
            </table>
        </div>
        <div class="box">
            <h2>SERVICES</h2>
            <table>
                <tr>
                    <td><a href="gstService.php">CREATE SERVICE</a></td>
                </tr>
            </table>
        </div>
        <div class="box">
            <h2>ORDER MANAGEMENT</h2>
            <table>
                <tr>
                    <td><a href="Clienti.php">CREATE ORDER</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <br><br>
    <form class="logout" action=# method="post">
                <input type=submit name="logout" value="LOGOUT">
                    <?php
                    session_start();
                        if(isset($_POST['logout'])){
                        $host="localhost";
                        $user="fredo";
                        $psw="12345";
                        $db="db_gstimpresapulizie";
                        $connect=mysqli_connect($host,$user,$psw,$db);
                            session_unset();
                            session_destroy();
                            header('Location:index.php');
                        exit;
                        mysqli_close($connect);
                        }            
                    ?>
        </form>
    </div>
</body>
</html>
