<?php
session_start();
include_once('config.php');

$sql = "";
$stmt = null;

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = $sql = "SELECT 
    m.*, 
    c.*, 
    f.*, 
    mi.*, 
    p.*, 
    e.* 
FROM 
    membros m
LEFT JOIN 
    contato c ON m.id = c.id_membro
LEFT JOIN 
    familia f ON m.id = f.id_membro
LEFT JOIN 
    ministerial mi ON m.id = mi.id_membro
LEFT JOIN 
    profissional p ON m.id = p.id_membro
LEFT JOIN 
    endereco e ON m.id = e.id_membro
WHERE 
    m.id LIKE ? OR 
    m.nome LIKE ? OR 
    m.cpf LIKE ? OR 
    m.rg LIKE ?
ORDER BY 
    m.id DESC";
    $stmt = $conexao->prepare($sql);
    $param = '%' . $data . '%';
    $stmt->bind_param('ssss', $param, $param, $param, $param);
} else {
    $sql = "select * from membros m, contato c, familia f, ministerial mi, profissional p, endereco e where m.id = c.id_membro and m.id = f.id_membro and m.id = mi.id_membro and m.id = p.id_membro and m.id = e.id_membro;";
    $stmt = $conexao->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    // Erro na consulta SQL
    echo "Erro na consulta SQL: " . $conexao->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">  
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_painel_membros.css">

    <script src="js/lote.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <title>EDOM - 10º Edição</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">




</head>
</head>
<body>
    <nav class="navbar ">
            <div class="container-fluid" style="display:flex; flex-direction:column;">
                <h1 >Ceia da Virada</h1>
                <h2 >Gerenciador de Inscrições</h2>
            </div>
      
    </nav>
    <div class="box-search" style="width:100%; display:flex;justify-content:center; align-itens:center;">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary" style="margin-left:10px;";>
        <button onclick="next()" class="tal_btn" style="margin-left:10px;";>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>


    <div class="clean" style="float: none;"></div>
    <div class="m-5">
        <table  >
            <thead style="color:black;">
                <tr class="tab active">
 
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">RG</th>
                        <th scope="col">Data Nascimento</th>
                </tr>

                <tr class="tab">
                        <th scope="col">Cep</th>           
                        <th scope="col">Logradouro</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Complemento</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Moradia</th>  
                </tr>

                    <tr class="tab">
                        <th scope="col">Telefone Celular</th>
                        <th scope="col">Telefone Residencial</th>
                        <th scope="col">E-mail</th>
                    </tr>

                    <tr class="tab">
                        <th scope="col">Escolaridade</th>
                        <th scope="col">Profissão</th>
                    </tr>

                    <tr class="tab">
                        <th scope="col">Pai</th>
                        <th scope="col">Mãe</th>           
                        <th scope="col">Estado Civil</th>
                        <th scope="col">Data Casamento</th>
                        <th scope="col">Nome Conjuge</th>
                        <th scope="col">Filhos</th>
                    </tr>

                    <tr class="tab">
                        <th scope="col">Carteirinha</th>
                        <th scope="col">Participa Ministerio</th>
                        <th scope="col">Ministerio</th>           
                        <th scope="col">Lidera</th>
                        <th scope="col">Lider qual ministerio</th>
                        <th scope="col">Batizado</th>
                        <th scope="col">Data Batismo</th>
                        <th scope="col">Encontro com Deus</th>
                        <th scope="col">Primeiros Passos</th>
                    </tr>    
                </tr>
            </thead>
            <tbody style="color:black;">
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        
                        echo "<tr class='tr active'>";
                        echo "<td>".$user_data['id_membro']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['cpf']."</td>";
                        echo "<td>".$user_data['rg']."</td>";
                        echo "<td>".$user_data['data_nascimento']."</td>";
          
                        echo "</tr>";

                        echo"<tr class='tr '>";
                        echo "<td>".$user_data['cep']."</td>";
                        echo "<td>".$user_data['logradouro']."</td>";
                        echo "<td>".$user_data['bairro']."</td>";
                        echo "<td>".$user_data['numero']."</td>";
                        echo "<td>".$user_data['complemento']."</td>";
                        echo "<td>".$user_data['cidade']."</td>";
                        echo "<td>".$user_data['estado']."</td>";
                        echo "<td>".$user_data['condicao_imovel']."</td>";
                        echo "</tr>";

                        echo "<tr class='tr '>";
                        echo "<td>".$user_data['telefone_celular']."</td>";
                        echo "<td>".$user_data['telefone_residencial']."</td>";
                        echo "<td>".$user_data['email']."</td>";
   
                        echo "</tr>";

                        echo "<tr class='tr '>";
                        echo "<td>".$user_data['escolaridade']."</td>";
                        echo "<td>".$user_data['profissao']."</td>";

                        echo "</tr>";

                        echo"<tr class='tr '>";
                        echo "<td>".$user_data['nome_pai']."</td>";
                        echo "<td>".$user_data['nome_mae']."</td>";
                        echo "<td>".$user_data['estado_civil']."</td>";
                        echo "<td>".$user_data['casamento']."</td>";
                        echo "<td>".$user_data['conjuge']."</td>";
                        echo "<td>".$user_data['filhos']."</td>";
               
                        echo "</tr>";
                       
                        echo"<tr class='tr '>";
                        echo "<td>".$user_data['carteirinha']."</td>";
                        echo "<td>".$user_data['parte_ministerio']."</td>";
                        echo "<td>".$user_data['cargo_ministerial']."</td>";
                        echo "<td>".$user_data['lider']."</td>";
                        echo "<td>".$user_data['cargo_lider']."</td>";
                        echo "<td>".$user_data['ingresso_igreja']."</td>";
                        echo "<td>".$user_data['cargo_lider']."</td>";
                        echo "<td>".$user_data['data_batismo']."</td>";
                        echo "<td>".$user_data['encontro_com_Deus']."</td>";
                        echo "<td>".$user_data['primeiros_passos']."</td>";
               
                        echo "</tr>";
                        
                    }
                    ?>
            </tbody>
        </table>
</div>


    <script src="js/busca_membros.js"></script>
        
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'painel-membros.php?search='+search.value;
    }

    


    </script>
</script>


    
        
</body>
</html>