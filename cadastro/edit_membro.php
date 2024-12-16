<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "SELECT 
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

        if ($stmt) {
            $stmt->bind_param('ssss', $id, $nome, $cpf, $rg); 
            $stmt->execute();
            $result = $stmt->get_result();
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $cpf = $user_data['cpf'];
                $rg = $user_data['rg'];
                $data_nascimento = $user_data['data_nascimento'];
                $cep = $user_data['cep'];

                $logradouro = $user_data['logradouro'];
                $bairro = $user_data['bairro'];
                $numero = $user_data['numero'];
                $complemento= $user_data['complemento'];
                $cidade = $user_data['cidade'];
                $estado= $user_data['estado'];
                $condicao_imovel = $user_data['condicao_imovel'];

                $telefone_celular = $user_data['telefone_celular'];
                $telefone_residencial = $user_data['telefone_residencial'];
                $email = $user_data['email'];

                $escolaridade = $user_data['escolaridade'];
                $profissao = $user_data['profissao'];

                $nome_pai = $user_data['nome_pai'];
                $nome_mae = $user_data['nome_mae'];
                $estado_civil = $user_data['estado_civil'];
                $data_casamento = $user_data['casamento'];
                $conjuge = $user_data['conjuge'];
                $filhos = $user_data['filhos'];

                $carteirinha = $user_data['carteirinha'];
                $parte_ministerio = $user_data['parte_ministerio'];
                $cargo_ministerial = $user_data['cargo_ministerial'];
                $lider = $user_data['lider'];
                $cargo_lider = $user_data['cargo_lider'];
                $ingresso_igreja = $user_data['ingresso_igreja'];
                $batizado = $user_data['batizado'];
                $data_batismo = $user_data['data_batismo'];
                $encontro_com_Deus = $user_data['encontro_com_Deus'];
                $primeiros_passos = $user_data['primeiros_passos'];
                
            }
        }
        else
        {
           
        }
    }
    else
    {
    }    
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Membros Mensageiros da Palavra</title>
    <link rel="stylesheet" type="text/css" href="../css/style_edit_membro.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-3.1.1.min.css" type="text/css" />

</head>
<body>
    <a href="pesquisar_membro.php">Voltar</a>
    <div class="box">
        <form action="editSave.php" method="POST">
            <fieldset>
                <legend><br>Editar Membro</br></legend>
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
                    <label for="rg" class="labelInput">RG: </label>
                    <input type="text" name="rg" id="rg" class="inputUser" value="<?php echo $rg;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="data_nascimento" class="labelInput">Data Nascimento: </label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" value="<?php echo isset($data_nascimento) ? date('', strtotime($data_nascimento)) : ''; ?>" required>
                </div>      
                
                
                <div class="inputBox">
                    <label for="cep" class="labelInput">CEP: </label>
                    <input type="text" name="cep" id="cep" class="inputUser"  value="<?php echo $cep;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="logradouro" class="labelInput">Logradouro: </label>
                    <input type="text" name="logradouro" id="logradouro" class="inputUser" value="<?php echo $logradouro;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="bairro" class="labelInput">Bairro: </label>
                    <input type="text" name="bairro" id="bairro" class="inputUser" value="<?php echo $bairro;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="numero" class="labelInput">Numero: </label>
                    <input type="number" name="numero" id="numero" class="inputUser" value="<?php echo $numero;?>" required>
                </div> 
                <div class="inputBox">
                    <label for="complemento" class="labelInput">Complemento: </label>
                    <input type="text" name="complemento" id="complemento" class="inputUser"  value="<?php echo $complemento;?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="cidade" class="labelInput">Cidade: </label>
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade;?>" required>
                </div> 
                <div class="inputBox">
                    <label for="estado" class="labelInput">Estado: </label>
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado;?>" required>
                </div> 
                <div class="inputBox">
                    <label for="condicao_imovel" class="labelInput">Situação Imóvel: </label>
                    <input type="text" name="condicao_imovel" id="condicao_imovel" class="inputUser" value="<?php echo $condicao_imovel;?>" required>
                </div>
                <br><br>


                <div class="inputBox">
                    <label for="telefone_celular" class="labelInput">Telefone Celular: </label>
                    <input type="number" name="telefone_celular" id="telefone_celular" class="inputUser" value="<?php echo $telefone_celular;?>" required>
                </div> 
                <div class="inputBox">
                    <label for="telefone_residencial" class="labelInput">Telefone Residencial: </label>
                    <input type="number" name="telefone_residencial" id="telefone_residencial" class="inputUser" value="<?php echo $telefone_residencial;?>" required>
                </div> 
                <div class="inputBox">
                    <label for="email" class="labelInput">E-mail: </label>
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email;?>" required>
                </div>
                <br><br>

                <div class="inputBox">
                <label for="escolaridade">Escolaridade:</label>
                        <select name="escolaridade" id="mySelect" required>
                                <option value="" disabled>Selecione uma opção</option>
                                <option name = "1" value="ensino_fudamental_completo" class="option" <?php echo ($escolaridade == 'Ensino Fundamental Completo') ? 'selected' : ''; ?>>Ensino Fundamental Completo</option>
                                <option name = "2" value="ensino_fudamental_cursando" class="option" <?php echo ($escolaridade == 'Ensino Fundamental Cursando') ? 'selected' : ''; ?>>Ensino Fundamental Cursando</option>
                                <option name = "3" value="ensino_fudamental_incompleto" class="option" <?php echo ($escolaridade == 'Ensino Fundamental incompleto') ? 'selected' : ''; ?>>Ensino Fundamental Incompleto</option>

                                <option name = "4" value="ensino_fudamental_completo" class="option" <?php echo ($escolaridade == 'Ensino Médio Completo') ? 'selected' : ''; ?>>Ensino Médio Completo (Antigo 2ºGrau)</option>
                                <option name = "5" value="ensino_fudamental_cursando" class="option" <?php echo ($escolaridade == 'Ensino Médio Cursando') ? 'selected' : ''; ?>>Ensino Médio Cursando</option>
                                <option name = "6" value="ensino_fudamental_incompleto" class="option" <?php echo ($escolaridade == 'Ensino Médio incompleto') ? 'selected' : ''; ?>>Ensino Médio Incompleto</option>

                                <option name = "7" value="ensino_superior_completo" class="option" <?php echo ($escolaridade == 'Ensino Superior Completo') ? 'selected' : ''; ?>>Ensino Superior Completo</option>
                                <option name = "8" value="ensino_superior_cursando" class="option" <?php echo ($escolaridade == 'Ensino Superior Cursando') ? 'selected' : ''; ?>>Ensino Superio Cursando</option>
                                <option name = "9" value="ensino_superior_incompleto" class="option" <?php echo ($escolaridade == 'Ensino Superior incompleto') ? 'selected' : ''; ?>>Ensino Superio Incompleto</option>
                        
                    
                        </select>
                </div> 
                <div class="inputBox">
                    <label for="profissao" class="labelInput">Profissão: </label>
                    <input type="profissao" name="profissao" id="profissao" class="inputUser" value="<?php echo $profissao;?>" required>
                </div>
                <br><br>
                
                
                
                <div class="inputBox">
                    <label for="nome_pai" class="labelInput">Pai: </label>
                    <input type="number" name="nome_pai" id="nome_pai" class="inputUser" value="<?php echo $nome_pai;?>" required>
                </div> 
                <div class="inputBox">
                    <label for="nome_mae" class="labelInput">Mãe: </label>
                    <input type="number" name="nome_mae" id="nome_mae" class="inputUser" value="<?php echo $nome_mae;?>" required>
                </div> 
                <div class="inputBox">
                <div class="inputBox">
                <label for="estado_civil: ">Estado Civil:</label>
                    <select name="estado_civil" id="mySelect" required >
                        <option value="" disabled >Selecione o estado civil</option>
                        <option value="solteiro" <?php echo ($estado_civil == 'solteiro') ? 'selected' : ''; ?>>Solteiro</option>
                        <option value="casado" <?php echo ($estado_civil == 'casado') ? 'selected' : ''; ?>>Casado</option>
                        <option value="divorciado" <?php echo ($estado_civil == 'divorciado') ? 'selected' : ''; ?>>Divorciado</option>
                        <option value="viuvo" <?php echo ($estado_civil == 'viuvo') ? 'selected' : ''; ?>>Viúvo</option>
            
                    </select><br>
                </div> 
                <label for="data_casamento">Data Casamento (Se casado): </label>    
                <input type="date" class="data_casamento" name="data_casamento" placeholder="Digite data de Casamento: " <?php echo isset($data_casamento) ? date('Y-m-d', strtotime($data_casamento)) : ''; ?>">
                </div>

                <div class="inputBox">
                    <label for="conjuge" class="labelInput">Nome Conjuge (*Se houver): </label>
                    <input type="conjuge" name="conjuge" id="conjuge" class="inputUser" value="<?php echo $conjuge;?>" required>
                </div>
                <div class="inputBox">
                <label for="mySelecty">Possui filhos? Se sim quantos:</label>
                        <select name="filhos" id="mySelect" >
                                <option value="" disabled>Selecione uma opção</option>
                                <option name = "1" value="1" class="option" <?php echo ($filhos == '1') ? 'selected' : ''; ?>>1</option>
                                <option name = "2" value="2" class="option" <?php echo ($filhos == '2') ? 'selected' : ''; ?>>2</option>
                                <option name = "3" value="3" class="option" <?php echo ($filhos == '3') ? 'selected' : ''; ?>>3</option>
                                <option name = "4" value="4" class="option"<?php echo ($filhos == '4') ? 'selected' : ''; ?>>4</option>
                                <option name = "5" value="5" class="option" <?php echo ($filhos == '5') ? 'selected' : ''; ?>>5</option>
                                <option name = "6" value="6" class="option" <?php echo ($filhos == '6') ? 'selected' : ''; ?>>6</option>
                                <option name = "7" value="7" class="option" <?php echo ($filhos == '7') ? 'selected' : ''; ?>>7 ou mais</option>

                            </select>
                </div> 
                <br><br>

                <div class="inputBox">
                <label for="carteirinha">Possui Carteirinha?</label>
                        <select name="carteirinha" id="mySelect" required>
                                <option value="" disabled>Selecione uma opção</option>
                                <option name = "1" value="1" class="option" <?php echo ($carteirinha == '1') ? 'selected' : ''; ?>>Sim</option>
                                <option name = "2" value="2" class="option" <?php echo ($carteirinha == '1') ? 'selected' : ''; ?>>Não</option>
                        </select>
                </div> 
                <div class="inputBox">
                <label for="lider">Lidera algum Mínisterio?</label>
                        <select name="lider" id="mySelect" required>
                                <option value="" disabled>Selecione uma opção</option>
                                <option name = "1" value="1" class="option" <?php echo ($lider == '1') ? 'selected' : ''; ?>>Sim</option>
                                <option name = "2" value="2" class="option" <?php echo ($lider == '2') ? 'selected' : ''; ?>>Não</option>
                        </select>
                </div> 
                <label for="cargo_ministerio">Qual ministério?</label>
                <div class="dropdown">
    <button class="dropdown-button">Selecione um ou mais ministérios</button>
    <div class="dropdown-content">
        <?php
      

        $cargos_ministerios = ['pastoral', 'diaconal', 'som']; 

        
        $todos_cargos = [
            'pastoral' => 'Pastoral',
            'presbiterio' => 'Presbiterio',
            'diaconal' => 'Diaconal',
            'obreiros' => 'Obreiros',
            'intercessão' => 'Intercessão',
            'integração' => 'Integração',
            'abba 1' => 'Abba 1',
            'abba 2' => 'Abba 2',
            'abba 3' => 'Abba 3',
            'professor primeiro passos' => 'Primeiros Passos (Professores)',
            'infantil' => 'Infantil (Kids)',
            'cantina' => 'Cantina',
            'social' => 'Social',
            'organização/limpeza' => 'Organização / Limpeza',
            'yeshua' => 'Yeshua',
            'yeshua kids' => 'Yeshua Kids',
            'mídia' => 'Mídia',
            'criativo' => 'Criativo',
            'operação' => 'Operação',
            'som' => 'Som',
            'site' => 'Site'
        ];

     
        foreach ($todos_cargos as $valor => $nome) {
            $checked = in_array($valor, $cargos_ministerios) ? 'checked' : '';
            echo "
            <label>
                <input type=\"checkbox\" name=\"cargo_ministerio[]\" value=\"$valor\" $checked> $nome
            </label>";
        }
        ?>
    </div>
</div>
         
                <div class="inputBox">
                    <label for="cargo_lider" class="labelInput">Cargo Lider (* Se houver): : </label>
                    <input type="text" name="cargo_lider" id="cargo_lider" class="inputUser" value="<?php echo $cargo_lider;?>" required>
                </div> 
                <div class="inputBox">
                <label for="data_batismo" class="labelInput">Data Batismo (* Se houver): </label>
                <input type="date" name="data_batismo" id="data_batismo" class="inputUser" value="<?php echo $data_batismo;?>" required>
                </div> 
                <div class="inputBox">
                        <label for="batizado">É batizado?</label>
                        <select name="batizado" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option" <?php echo ($batizado == '1') ? 'selected' : ''; ?>>Sim</option>
                                <option name = "2" value="2" class="option"  <?php echo ($batizado == '2') ? 'selected' : ''; ?>>Não</option>
                        </select>
                </div>
                <div class="inputBox">
                    <label for="data_batismo" class="labelInput">Data Batismo (* Se houver): </label>
                    <input type="date" name="data_batismo" id="data_batismo" class="inputUser" value="<?php echo $data_batismo;?>" required>
                </div> 
                <div class="inputBox">

                <label for="encontro_com_Deus">Já participou do Encontro com Deus?</label>
                        <select name="encontro_com_Deus" id="mySelect" required>
                                <option value="" disabled>Selecione uma opção</option>
                                <option name = "1" value="1" class="option" <?php echo ($encontro_com_Deus == '1') ? 'selected' : ''; ?>>Sim</option>
                                <option name = "2" value="2" class="option" <?php echo ($encontro_com_Deus == '2') ? 'selected' : ''; ?>>Não</option>
                        </select>

                </div> 

                <div class="inputBox">
                <label for="primeiros_passos">Fez os primeiros passos?</label>
                        <select name="primeiros_passos" id="mySelect" required>
                                <option value="" disabled>Selecione uma opção</option>
                                <option name = "1" value="1" class="option" <?php echo ($primeiros_passos == '1') ? 'selected' : ''; ?>>Sim</option>
                                <option name = "2" value="2" class="option" <?php echo ($primeiros_passos == '2') ? 'selected' : ''; ?>>Não</option>
                        </select>
                </div>
                <br><br>
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    
    </div>

    <script>
      document.querySelector('.dropdown-button').addEventListener('click', function() {
        this.parentNode.classList.toggle('open');
    });

    const checkboxes = document.querySelectorAll('input[name="cargo_ministerio[]"]');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedCheckboxes = document.querySelectorAll('input[name="cargo_ministerio[]"]:checked');
            if (selectedCheckboxes.length > 2) {
                alert("Você pode selecionar no máximo 2 opções.");
                this.checked = false; 
            }
        });
    });
    </script>
</body>

</html>
    
