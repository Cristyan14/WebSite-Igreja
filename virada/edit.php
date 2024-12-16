<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM virada WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $cpf = $user_data['cpf'];
                $numero = $user_data['numero'];
                $sobremesa = $user_data['sobremesa'];
                $pagamento_final = $user_data['pagamento_final'];
            
            }
        }
        else
        {
            header('Location: painel-adm.php');
        }
    }
    else
    {
        header('Location: painel-adm.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes GETS Burguer</title>
    <link rel="stylesheet" type="text/css" href="css/style_formulario.css">
    <style>
    form {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

fieldset {
    border: none;
    padding: 0;
}

legend {
    font-size: 1.5rem;
    font-weight: bold;
    color: #343a40;
    text-align: center;
}

.inputBox {
    margin-bottom: 20px;
}

.labelInput {
    display: block;
    font-size: 1rem;
    margin-bottom: 8px;
    color: #495057;
}

.inputUser {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.2s;
}

.inputUser:focus {
    border-color: #495057;
    outline: none;
}

#submit {
    display: block;
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    color: #fff;
    background: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#submit:hover {
    background: #0056b3;
}

label[for="pagamento"] {
    display: block;
    font-size: 1rem;
    margin-top: 20px;
    margin-bottom: 8px;
    color: #495057;
}

#pagamento {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ced4da;
    border-radius: 5px;
    margin-bottom: 20px;
    box-sizing: border-box;
    transition: border-color 0.2s;
}

#pagamento:focus {
    border-color: #495057;
    outline: none;
}

    </style>
</head>
<body>
    <a href="painel-adm.php">Voltar</a>
    <div class="box">
        <form action="editSave.php" method="POST">
            <fieldset>
                <legend><br>Editar Inscrições</br></legend>
                <br>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome completo: </label>
                    <input type="text" name="nome" id="nome" class="inputUser"  value="<?php echo $nome;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="cpf" class="labelInput">CPF: </label>
                    <input type="teste" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone" class="labelInput">Telefone: </label>
                    <input type="text" name="telefone" id="telefone" class="inputUser" value="<?php echo $numero;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="sobremesa" class="labelInput">Sobremesa: </label>
                    <input type="text" name="sobremesa" id="sobremesa" class="inputUser" value="<?php echo $sobremesa;?>" required>
                </div>        
        
                <label for="pagamento_final"><b>Pagamento: </b></label>
                <input type="text" name="pagamento_final" id="pagamento" value="<?php echo $pagamento_final;?>" >
                <br><br>
              
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    
    </div>

   
</body>

</html>
    
</body>
</html>