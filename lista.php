<!DOCTYPE html>
<html>
<head>
<title>Softlaw</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>

   <!--Para não inserir o código todo da navbar abaixo, coloquei apenas o include para ficar mais "clean" -->

    <?php include 'includes/navbar.php'; ?>  

    <div class="container">

        <h2>Minhas Audiências</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número do Processo</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Advogado</th>
                    <th>Fórum</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>

            <?php
                // incluindo o arquivo de configuração Database.
                require_once "includes/config_database.php";
                
                // Executando a consulta na tabela do Banco e o while verifica os registros e " joga" em uma fila um a um para formar a lista de audiências.
                $sql = "SELECT * FROM audiencias";
                $result = mysqli_query($db, $sql);
                if ($result){
                    if(mysqli_num_rows($result) > 0){
                       
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['numero_processo'] . "</td>";
                                $data = date_create($row['data_audiencia']);
                                echo "<td>" . date_format($data, "d/m/Y") . "</td>";
                                echo "<td>" . $row['horario_audiencia'] . "</td>";
                                echo "<td>" . $row['advogado'] . "</td>";
                                echo "<td>" . $row['forum_audiencia'] . "</td>";
                                echo "<td>" . $row['endereco_forum'] . "</td>";
                            echo "</tr>";
                        }
                           
                        // Liberar espaço de memória do está sendo usado em consultas(Boas práticas)
                        mysqli_free_result($result);
                    } else{
                        echo '<tr><td>Não existem Audiências Cadastradas.</td></tr>';
                    }
                } else{
                    echo '<tr><td>Houve um erro ao conectar no Banco de Dados</td></tr>';
                }

                // Fecha a conexão aberta anteriormente com o banco de dados.
                mysqli_close($db);
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>