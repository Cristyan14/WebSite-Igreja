<?php
session_start();
include_once('config.php');


$stmt = null;


    $data = isset($_GET['search']) ? $_GET['search'] : '';
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
    <link rel="stylesheet" href="css/pesquisar_membros.css">

    <script src="js/lote.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <title>EDOM - 10º Edição</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">




</head>
</head>
<body>
<header id="header">
     <img src="img/logo.png" alt="" srcset="">
  
     <nav id="nav">
       
         <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
             <span id="hamburger"></span>
         </button>
         <ul id="menu" role='menu'>
       
             <li><a href="#inicio">Inicío</a></li>
             <li><a href="#sobre">Sobre</a></li>
             <li><a href="#ministerios">Ministérios</a></li>
             <li><a href="calendario.php">Calendário</a></li>


         </ul>
     </nav>
 </header>
 <main>
    <nav class="navbar ">
            <div class="container-fluid" style="display:flex; flex-direction:column;">
                <h1 >Buscar Membro</h1>
                <h2 >Gerenciador de Membros - MP</h2>
            </div>
      
    </nav>


    <div class="box-search" style="width:100%; display:flex;justify-content:center; align-itens:center;">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary" style="margin-left:10px;";>
     
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>


 

    <br>            
    <section class="dados">
        <table>
                <tbody style="color:black;">
                    <?php
                    if(!empty($data)){
                        if($result->num_rows > 0){

                    
                        while($user_data = mysqli_fetch_assoc($result)) {
                            
                            echo "<tr class='tr active'>";
                            echo "<td>
                            <a class='btn btn-sm btn-primary' href='edit_membro.php?id=$user_data[id_membro]' title='Editar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                                </a> 
                                <a class='btn btn-sm btn-danger' href='delete_membro.php?id=$user_data[id]' title='Deletar'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                </a>
                                </td>";
                            echo "</tr>";
                            echo "<tr><td><h2>Dados Pessoais:</h2></tr></td>";
                            echo "<tr><td><strong>ID:</strong> ".$user_data['id_membro']."</td></tr>";
                            echo "<tr><td><strong>Nome:</strong> ".$user_data['nome']."</td></tr>";
                            echo "<tr><td><strong>CPF:</strong> ".$user_data['cpf']."</td></tr>";
                            echo "<tr><td><strong>RG:</strong> ".$user_data['rg']."</td></tr>";
                            echo "<tr><tr><td><strong>Data Nascimento:</strong> ".$user_data['data_nascimento']."</td></tr>";
                            echo "<tr><td><h2>Dados Residenciais:</h2></tr></td>";
                            echo "<tr><td><strong>Cep:</strong> ".$user_data['cep']."</td></tr>";
                            echo "<tr><td><strong>Logradouro:</strong> ".$user_data['logradouro']."</td></tr>";
                            echo "<tr><td><strong>Bairro:</strong> ".$user_data['bairro']."</td></tr>";
                            echo "<tr><td><strong>Numero:</strong> ".$user_data['numero']."</td></tr>";
                            echo "<tr><td><strong>Complemento:</strong> ".$user_data['complemento']."</td></tr>";
                            echo "<tr><td><strong>Cidade:</strong> ".$user_data['cidade']."</td></tr>";
                            echo "<tr><td><strong>Estado:</strong> ".$user_data['estado']."</td></tr>";
                            echo "<tr><td><strong>Condicao Imovel:</strong> ".$user_data['condicao_imovel']."</td></tr>";
                            echo "<tr><td><h2>Dados de Contato:</h2></tr></td>";
                            echo "<tr><td><strong>Telefone Celular:</strong> ".$user_data['telefone_celular']."</td></tr>";
                            echo "<tr><td><strong>Telefone Residencial:</strong> ".$user_data['telefone_residencial']."</td></tr>";
                            echo "<tr><td><strong>E-mail:</strong> ".$user_data['email']."</td></tr>";
                            echo "<tr><td><h2>Dados Profissionais/Acadêmicos:</h2></tr></td>";
                            echo "<tr><td><strong>Escolaridade:</strong> ".$user_data['escolaridade']."</td></tr>";
                            echo "<tr><td><strong>Profissao:</strong> ".$user_data['profissao']."</td></tr>";
                            echo "<tr><td><h2>Dados Familiares:</h2></tr></td>";
                            echo "<tr><td><strong>Nome Pai:</strong> ".$user_data['nome_pai']."</td></tr>";
                            echo "<tr><td><strong>Nome Mae:</strong> ".$user_data['nome_mae']."</td></tr>";
                            echo "<tr><td><strong>Estado Civil:</strong> ".$user_data['estado_civil']."</td></tr>";
                            echo "<tr><td><strong>Data Casamento:</strong> ".$user_data['casamento']."</td></tr>";
                            echo "<tr><td><strong>Conjuge:</strong> ".$user_data['conjuge']."</td></tr>";
                            echo "<tr><td><strong>Filhos:</strong> ".$user_data['filhos']."</td></tr>";
                            echo "<tr><td><h2>Dados Ministeriais:</h2></tr></td>";
                            echo "<tr><td><strong>Carteirinha:</strong> ".$user_data['carteirinha']."</td></tr>";
                            echo "<tr><td><strong>Parte Ministerio:</strong> ".$user_data['parte_ministerio']."</td>";
                            echo "<tr><td><strong>Cargo Ministerial:</strong> ".$user_data['cargo_ministerial']."</td></tr>";
                            echo "<tr><td><strong>Lider:</strong> ".$user_data['lider']."</td></tr>";
                            echo "<tr><td><strong>Cargo Lider:</strong> ".$user_data['cargo_lider']."</td></tr>";
                            echo "<tr><td><strong>Ingresso Igreja:</strong> ".$user_data['ingresso_igreja']."</td></tr>";
                            echo "<tr><td><strong>Batizado:</strong> ".$user_data['batizado']."</td></tr>";
                            echo "<tr><td><strong>Data Batismo:</strong> ".$user_data['data_batismo']."</td></tr>";
                            echo "<tr><td><strong>Encontro com Deus:</strong> ".$user_data['encontro_com_Deus']."</td></tr>";
                            echo "<tr><td><strong>Primeiros Passos:</strong> ".$user_data['primeiros_passos']."</td</tr>";
                            echo "</tr>";
                            
                        }
                    }else{
                        echo "<tr><td colspan='30'>Nenhum registro encontrado.</td></tr>";
                    }
                }else{
                    echo "<tr><td colspan='30'>Por favor, faça uma pesquisa para exibir os resultados.</td></tr>";
                }
                        ?>
                </tbody>
            </table>
            </section>
            </main>

                <footer>

                </footer>
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
                window.location = 'pesquisar_membro.php?search='+search.value;
            }

            


            </script>



    
        
</body>
</html>