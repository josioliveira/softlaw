<?php
// incluindo o arquivo de configuração Database.
require_once "includes/config_database.php";
 
// Definição das variáveis. 
$numero_processo = "";
$data_audiencia = "";
$horario_audiencia = "";
$advogado = "";
$forum_audiencia = "";
$endereco_forum = "";

// Mensagem de erro caso não preenchem todas as informações contidas no formulário(cadastro de audiências).
$msg_error = "";

 
// Primeiro verifica se a página foi chamada via método POST
// Em seguida ele processa os dados do formulário.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_processo = $_POST["numero_processo"];
    $data_audiencia = $_POST["data_audiencia"];
    $horario_audiencia = $_POST["horario_audiencia"];
    $advogado = $_POST["advogado"];
    $forum_audiencia = $_POST["forum_audiencia"];
    $endereco_forum = $_POST["endereco_forum"];

    // Caso os campos abaixo não forem preenchidos ocorrerá o erro com um alerta. 
    if (empty($numero_processo) or empty($data_audiencia) or empty($horario_audiencia) or empty($advogado) or empty($forum_audiencia) or empty($endereco_forum)) {
        $msg_error = "Todos os campos são de preenchimento obrigatórios";

    }else{
        // Montei o insert e inseri os dados vindos do POST. 
        // O ? são os paramâmetros dos nomes dos campos. (nota-se 6 campos, 6 pontos de interrogações)
        // O Statement é um intermediador para linkar/preparar o banco a instrução sql.
        $sql = "INSERT INTO audiencias (numero_processo, data_audiencia, horario_audiencia, advogado, forum_audiencia, endereco_forum) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $sql);

        if ($stmt) {
           
            // Passa as variáveis ​​ao Statement como parâmetros.
            // "sss" formato dos paramêtros, nota-se (A quantidade tem que ser igual as variáveis contidas).
            mysqli_stmt_bind_param($stmt, "ssssss", $numero_processo, $data_audiencia, $horario_audiencia, $advogado, $forum_audiencia, $endereco_forum);
            
            //Executa de fato a instrução que foi preparada no " mysqli_prepare").
            if (mysqli_stmt_execute($stmt)) {
               
                header("location: index.php");
                exit();
            } else{
                echo "Houve um erro ao Salvar a Audiencia.";
            }
        }
            
        // Fecha a função statement
        mysqli_stmt_close($stmt);
    
        // Fecha a conexão BD.
        mysqli_close($db);
        
    }
 
}
?>

<!DOCTYPE html>
<html>
<head>

<!--Abaixo a criação da página Cadastro com Bootstrap -->
<title>Criar Audiências</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <h2>Criar Audiências</h2>

        <?php 
            if (!empty($msg_error)) {
                echo "<div class='alert alert-danger' role='alert'>" . $msg_error . "</div>";
            }
        ?>
        
        <form action="cadastro.php" method="post">
            <div class="row mb-3">
                <label for="numero_processo">Número do Processo:</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" placeholder="Digite o número do processo" id="numero_processo" name="numero_processo">
                </div>
            </div>

            <div class="row mb-3">
                <label for="data_audiencia">Data:</label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" placeholder="Data da Audiência" id="data_audiencia" name="data_audiencia">
                </div>
            </div>

            <div class="row mb-3">
                <label for="horario_audiencia">Hora:</label>
                <div class="col-sm-12">
                    <input type="time" class="form-control" placeholder="Hora da Audiência" id="horario_audiencia" name="horario_audiencia">
                </div>
            </div>

            <div class="row mb-3">
                <label for="advogado">Advogado(a):</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" placeholder="Nome do Advogado" id="advogado" name="advogado">
                </div>
            </div>

            <div class="row mb-3">
                <label for="forum_audiencia">Fórum:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" placeholder="Nome do Fórum" id="forum_audiencia" name="forum_audiencia">
                </div>
            </div>

            <div class="row mb-3">
                <label for="endereco_forum">Endereço:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" placeholder="Digite o endereço do Fórum" id="endereco_forum" name="endereco_forum">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>

</body>
</html>
