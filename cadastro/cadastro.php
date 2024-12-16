<!DOCTYPE html>
<html lang="pt-br">
<head>

 <meta charset="UTF-8">
 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="../css/style_cadastro.css">
 <title>Mensageiros da Palavra</title>
 <link rel="stylesheet" href="css/bootstrap-3.1.1.min.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    
</head>
<body>

<section class="menu">
 <header id="header">
     <img src="../img/logo.png" alt="" srcset="">
        
     <nav id="nav">
       
         <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
             <span id="hamburger"></span>
         </button>
         <ul id="menu" role='menu'>
       
             <li><a href="../index.php">Inicío</a></li>
             <li><a href="#sobre">Sobre</a></li>
             <li><a href="#ministerios">Ministérios</a></li>
             <li><a href="../calendario/calendario">Calendário</a></li>
             <li><a href="login.php">Login</a></li>

         </ul>
     </nav>
 </header>

    <section class="formulario">
        <div class="form">
        <form method="POST" action="cadastrar_membro.php">
        <h1>Cadastro de Membros - Mensageiros da Palavra</h1>
        <div class="steps">
            <span class="step active">1</span>
            <span class="step">2</span>
            <span class="step">3</span>
            <span class="step">4</span>
            <span class="step">5</span>
            <span class="step">6</span>
        </div>
 
        <br><br>
                <div class="limitador">
                    <div class="tab active ">
                        <h3>Dados Pessoais</h3>
                        <div class="div">
                            <label for="nome">Nome Completo: </label>    
                            <input type="text" class="nome" required name="nome" placeholder="Digite seu Nome:">
                 
                
                        
                        <label for="cpf">CPF: </label>    
                            <input type="text" class="cpf" required name="cpf" onkeypress="apenasNumeros(event)" placeholder="Digite seu CPF: ">
                        
                        <br>
                        <label for="rg">RG: </label>    
                        <input type="text" class="rg" required name="rg" placeholder="Digite seu RG: ">
                        
                        <label for="data_nascimento">Data Nascimento: </label>    
                        <input type="date" class="data_nascimento" required name="data_nascimento" placeholder="Digite sua Data de Nascimento: ">

                        <label for="senha">Senha: </label>    
                        <input type="password" id="senha" class="senha" required name="senha" placeholder="Informe uma senha para logar: ">
                       <label for="confirmar_senha">Confirme sua senha: </label>    
                        <input type="password" id="confirmar_senha"  class="confirmar_senha" required name="confirmar_senha" placeholder="Confirme sua senha: ">
                  
                            <div class="botoes">
                            <button type="button" style="background-color:#f7f7f7; cursor:default;"></button>
                            <button type="button" onclick="validarSenha()">Próximo</button>
                            </div>
                        
                        </div>
                        </div>
                    </div><!--Dados Pessoais-->


                    <div class="tab">
                        <h3>Dados Residenciais</h3>
                    
                        <label for="cep">CEP:</label>
                        <input type="text" id="cep" name="cep" required  placeholder="Digite o CEP" onkeypress="apenasNumeros(event)" onblur="buscaCep()"><br>
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" id="logradouro" name="logradouro" placeholder="Digite o logradouro" required readonly><br>
                        <label for="bairro">Bairro:</label>
                        <input type="text" id="bairro" name="bairro" placeholder="Digite o bairro" required readonly><br>
                        <label for="numero">Numero:</label>
                        <input type="text" id="numero" name="numero" required placeholder="Digite o Número" ><br>
                        <label for="complemento">Complemento:</label>
                        <input type="text" id="complemento" name="complemento" required placeholder="Digite o Complemento" ><br>
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" required readonly placeholder="Digite sua Cidade"><br>
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado" required readonly placeholder="Digite o seu Estado"><br>

                        <label for="mySelect">Moradia:</label>
                        <select name="condicao_imovel" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="proprio" class="option">Próprio</option>
                                <option name = "2" value="alugado" class="option" >Alugado</option>
                                <option name = "3" value="cedido" class="option" >Cedido</option>
                        
                    
                        </select>
                        <br>
                        <div class="botoes">
                            <button type="button" onclick="prevTab()">Anterior</button>
                            <button type="button" onclick="nextTab()">Próximo</button>
                        </div>
                    </div>


                    <div class="tab">
                        <h3>Dados de Contato</h3>
                        <label for="telefone_celular">Telefone Celular:</label>
                        <input type="text" id="telefone_celular" name="telefone_celular" onkeypress="apenasNumeros(event)" required  placeholder="Digite seu telefone celular:"><br>
                        <label for="telefone_residencial">Telefone Residencial:</label>
                        <input type="text" id="telefone_residencial" name="telefone_residencial" onkeypress="apenasNumeros(event)"  placeholder="Digite seu telefone residencial (caso houver):"><br>
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required  placeholder="Digite seu E-mail:"><br>
                        <div class="botoes">
                            <button type="button" onclick="prevTab()">Anterior</button>
                            <button type="button" onclick="nextTab()">Próximo</button>
                        </div>
                    </div>


                    <div class="tab">
                        <h3>Dados Profissionais</h3>
                    
                        <label for="escolaridade">Escolaridade:</label>
                        <select name="escolaridade" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="ensino_fudamental_completo" class="option">Ensino Fundamental Completo</option>
                                <option name = "2" value="ensino_fudamental_cursando" class="option" >Ensino Fundamental Cursando</option>
                                <option name = "3" value="ensino_fudamental_incompleto" class="option" >Ensino Fundamental Incompleto</option>

                                <option name = "4" value="ensino_fudamental_completo" class="option">Ensino Médio Completo (Antigo 2ºGrau)</option>
                                <option name = "5" value="ensino_fudamental_cursando" class="option" >Ensino Médio Cursando</option>
                                <option name = "6" value="ensino_fudamental_incompleto" class="option" >Ensino Médio Incompleto</option>

                                <option name = "7" value="ensino_superior_completo" class="option">Ensino Superior Completo</option>
                                <option name = "8" value="ensino_superior_cursando" class="option" >Ensino Superio Cursando</option>
                                <option name = "9" value="ensino_superior_incompleto" class="option" >Ensino Superio Incompleto</option>
                        
                    
                        </select>
                        
                        <label for="profissao">Profissão:</label>
                        <input type="text" id="profissao" name="profissao" required placeholder="Digite sua profissão"><br>
                        <div class="botoes">
                            <button type="button" onclick="prevTab()">Anterior</button>
                            <button type="button" onclick="nextTab()">Próximo</button>
                        </div>
                    </div>


                    <div class="tab">
                        <h3>Dados Familiar</h3>
                        <label for="nome_pai">Pai:</label>
                        <input type="text" id="nome_pai" name="nome_pai" placeholder="Digite o nome do seu Pai" ><br>
                        <label for="nome_mae">Mãe:</label>
                        <input type="text" id="nome_mae" name="nome_mae" placeholder="Digite o nome de sua Mãe" required><br>
                        <label for="estado_civil: ">Estado Civil:</label>
            
                            <select name="estado_civil" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="solteiro" class="option">Solteiro</option>
                                <option name = "2" value="casado" class="option" >Casado</option>
                                <option name = "3" value="divorciado" class="option" >Divorciado</option>
                                <option name = "4" value="viuvo" class="option" >Viuvo</option>
                    
                            </select><br>
                        <label for="data_casamento">Data Casamento (Se casado): </label>    
                        <input type="date" class="data_casamento" name="data_casamento" placeholder="Digite data de Casamento: ">
                        
                        <label for="nome_conjuge">Nome Conjugê: </label>    
                        <input type="text" class="nome_conjuge" name="nome_conjuge" placeholder="Digite o nome do seu Conjûge: ">
                        <label for="mySelecty">Possui filhos? Se sim quantos:</label>
                        <select name="filhos" id="mySelect" >
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">1</option>
                                <option name = "2" value="2" class="option" >2</option>
                                <option name = "3" value="3" class="option" >3</option>
                                <option name = "4" value="4" class="option">4</option>
                                <option name = "5" value="5" class="option" >5</option>
                                <option name = "6" value="6" class="option" >6</option>
                                <option name = "7" value="7" class="option" >7 ou mais</option>

                            </select>

                            <div class="botoes">
                            <button type="button" onclick="prevTab()">Anterior</button>
                            <button type="button" onclick="nextTab()">Próximo</button>
                            </div>
                    </div>

                    <div class="tab ">
                        <h3>Dados Ministeriais</h3>
                        <label for="carteirinha">Possui Carteirinha?</label>
                        <select name="carteirinha" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">Sim</option>
                                <option name = "2" value="2" class="option" >Não</option>
                        </select>
                        <label for="ministerio_parte">Faz parte de algum Minísterio?</label>
                        <select name="ministerio_parte" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">Sim</option>
                                <option name = "2" value="2" class="option" >Não</option>
                        </select>
                    
                        <br>
                        <label for="cargo_ministerio">Qual ministério?</label>
<div class="dropdown">
    <button class="dropdown-button">Selecione um ou mais ministérios</button>
    <div class="dropdown-content">


        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="pastoral"> Pastoral
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="presbiterio"> Presbiterio
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="diaconal"> Diaconal
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="obreiros"> Obreiros
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="intercessão"> Intercessão
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="integração"> Integração
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="abba 1"> Abba 1
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="abba 2"> Abba 2
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="abba 3"> Abba 3
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="professor primeiro passos"> Primeiros Passos (Professores)
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="infantil"> Infantil (Kids)
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="cantina"> Cantina
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="social">Social
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="organização/limpeza"> Organização / Limpeza
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="yeshua"> Yeshua
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="yeshua kids"> Yeshua Kids
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="mídia"> Mídia
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="criativo"> Criativo
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="operação"> Operação
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="som"> Som
        </label>
        <label>
            <input type="checkbox" name="cargo_ministerio[]" value="site"> Site
        </label>
    </div>
</div>



                        <label for="lider">Lidera algum Mínisterio?</label>
                        <select name="lider" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">Sim</option>
                                <option name = "2" value="2" class="option" >Não</option>
                        </select>
                        <label for="cargo_lider">Se sim, qual departamento lidera?</label>
                        <input type="text" id="cargo_lider" name="cargo_lider" required placeholder="Caso seja nenhum digite NA"><br>


                        <label for="ingresso_igreja">Data Ingresso Igreja</label>
                        <input type="date" id="ingresso_igreja" name="ingresso_igreja">
                        <label for="batizado">É batizado?</label>
                        <select name="batizado" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">Sim</option>
                                <option name = "2" value="2" class="option" >Não</option>
                        </select>

                        <label for="data_batismo">Caso seja batizado, selecione a data:</label>
                        <input type="date" id="data_batismo" name="data_batismo">

                        <label for="encontro_com_Deus">Já participou do Encontro com Deus?</label>
                        <select name="encontro_com_Deus" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">Sim</option>
                                <option name = "2" value="2" class="option" >Não</option>
                        </select>

                        <label for="primeiros_passos">Fez os primeiros passos?</label>
                        <select name="primeiros_passos" id="mySelect" required>
                                <option value="">Selecione uma opção</option>
                                <option name = "1" value="1" class="option">Sim</option>
                                <option name = "2" value="2" class="option" >Não</option>
                        </select>

                        <div class="botoes">
                            <button type="button" onclick="prevTab()">Anterior</button>
                            <button type="submit" name="submit" class="glow-on-hover" >Cadastrar</button>
                        </div>
                    
        
                    
                    </div>




                    </div>
        </form>
  

    </section>
    <footer>
        <div class="section-itens">
        <div class="limitador">
            <div class="div-logo">
                    <img src="../img/logo.png" alt="">
            </div>
            <div class="div-text">
            <ul>
                <li><a href="../index.php">Inicío</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="primeiros_passos/primeiros_passos.php">Primeiros Passos</a></li>
                <li><a href="calendario/calendario.php">Calendário</a></li>
                </ul>
            </div>
            <div class="div-icons">
            <a href="https://www.facebook.com/@eusoumensageiros/" target="u_blank" style="width:25; height:25;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg></a>

            <a href="https://www.instagram.com/eusoumensageiros/" target="u_blank" style="width:25; height:25;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
            </svg></a>

            <a href="https://www.youtube.com/@mensageirosdapalavra1893" target="u_blank" style="width:25; height:25;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
            </svg></a>
            </div>

            <div class="copyright">
                    <p><a href="#">Politica de Privacidade</a></p>
                    <p>Copyright ©2024 | Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
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
    <script src="../js/endereco.js"></script>
<script src="../js/mobile.js"></script>
<script src="../js/forms.js"></script>
</body>
</html>