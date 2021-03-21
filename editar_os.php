<?php
session_start();
require_once"config.php";


if (!isset($_SESSION['usuario']) && !isset($_SESSION['senha']) ) {
   echo  ("<script>
        window.alert('Pagina não encontrada')
        window.location.href='index.php';
    </script>");
    exit;

}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="imagens/logo.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/listar_usuario.css">
        <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <!-- Font awesome JS-->
        <script defer src="js/fontawesome.min.js"></script>

        <title>V&S</title>
    </head>
    <body>
        <!-- Inicio do Navbar e menu -->
        <nav class="navbar navbar-expand navbar-dark bg-primary">
            <a class="sidebar-toogle text-light mr-3 icone">
                <span class="navbar-toggler-icon"></span>
            </a>
            <a class="navbar-brand" href="index.html">V&S</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="imagens/logo.png" class="rounded-circle" height="30" width="30" style="margin-right: 10px;"><span class="d-none d-md-inline">Usuário</span>  
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                <span class="pers-icone">
                                    <i class="fas fa-user-circle"></i>
                                </span>Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                 <span class="pers-icone">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav><!-- Termino do Navbar -->
        
        <div class="d-flex">
            <!-- Inicio do menu lateral -->
             <nav class="sidebar"> 
                <ul class="list-unstyled">
                    <li>
                        <a href="dashboard.php">
                            <!-- Adicionar icone Font awesome-->
                            <span class="pers-icone">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>Dashbord
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-toggle="collapse">
                            <span class="pers-icone">
                                <i class="fas fa-user-circle"></i>
                            </span>Cadastros
                        </a>
                        <ul class="list-unstyled collapse" id="submenu1">
                            <li>
                                <a href="cadastro.php" class="padding-esquerda">
                                    <span class="pers-icone">
                                        <i class="fas fa-users"></i>
                                    </span>Ordem de Serviço
                                </a>
                            </li>
                            <li>
                                <a href="#" class="padding-esquerda">
                                    <span class="pers-icone">
                                        <i class="fas fa-key"></i>
                                    </span>Listar O.S.
                                </a>
                            </li>
                        </ul>
                    </li>                   
                    <li class="active"><a href="listar_os.php">Listar O.S.</a></li>                 
                    <li>
                        <a href="logout.php">
                            <span class="pers-icone">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>Sair   
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Fim do menu lateral -->
            
            <?php 

            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

                if ($id) {
                     $sql="SELECT * FROM ordemservico WHERE CODOR = $id";
                     $resultado = mysqli_query($conexao, $sql);

                     if (mysqli_num_rows($resultado) > 0) {
                    
                        $result = mysqli_fetch_assoc($resultado);
                
                     }
                }


            ?>
            <!-- Inicio cadastrar usuarios-->
            <div class="content p-1 w-100">
                <div class="list-group-item">
                    <div class="d-flex">
                            <div class="mr-auto p-2 mb-1">
                                <h2 class="display-4 titulo "> Editar Usuario</h2>
                            </div>
                        <!-- Botão cadastrar usuario -->
                        <div class="p-2">
                            <span class="d-md-none d-sm-none d-lg-block" >
                              <a href="listar_os.php?id=<?php echo $id ?>" class="btn btn-sm btn-outline-info">Listar
                              </a>
                              <a href="visualizar_os.php?id=<?php echo $id ?>" class="btn btn-sm btn-outline-primary">Visualizar
                              </a>
                              <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#apagarModal">Apagar</a>
                            </span>
                                  <!-- Botão Dropdown do menu para tablet e smartphone -->
                            <div class="dropdown d-lg-none d-xl-none">
                              <button class="btn btn-outline-primary dropdown-toggle" type="button" id="acoesMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesMenu">
                                    <a class="dropdown-item" href="listar_os.php?id=<?php echo $id ?>">Listar</a>
                                    <a class="dropdown-item" href="isualizar_os.php?id=<?php echo $id ?>">Visulizar</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#apagarModal" >Apagar</a>
                              </div>
                            </div><!-- Fim do botão Dropdown -->
                            </div>
                    </div><hr>
                   <form method="POST" action="validaEditar.php">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Codigo da O.S.</label>
                                <input name="codigo" value="<?php echo $result['CODOR'] ?>" type="text" class="form-control" id="codigo" readonly = "true" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Tag</label>
                                <input name="tag" value="<?php echo $result['TAG'] ?>" type="text" class="form-control" id="tag" placeholder="Descrição de forma resumida">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tipo de Manutenção</label>
                                <input name="tipman" value="<?php echo $result['TIPMAN'] ?>" type="text" class="form-control" id="tipman" placeholder="Tipo de Manutenção">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Setor Executante</label>
                                <input name="setexe" value="<?php echo $result['SETEXE'] ?>" type="text" class="form-control" id="setexe" placeholder="Setor que ira executar a Manutenção">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Responsável</label>
                                <input name="resp" type="text" value="<?php echo $result['RESP'] ?>" class="form-control" id="resp" placeholder="Quem vai executar a Manutenção?">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Aplicação</label>
                                <input name="aplic" type="text" value="<?php echo $result['APLIC'] ?>" class="form-control" id="aplic" placeholder="Qual maquina ou equipamento precisa de Manutenção">
                            </div>         
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option selected>Selecione</option>

                                    <?php 
                                    
                                    $check1 ="";
                                    $check2 =""; 
                                    $check3 =""; 
                                    $check4 ="";
                                    $check5 =""; 
                                   

                                    switch ($result['ESTADO']) {
                                        case '1':
                                            $check1 = "selected";
                                            break;
                                        
                                        case '2':
                                            $check2 = "selected";
                                            break;    

                                    }

                                     switch ($result['CIDADE']) {
                                        case '1':
                                            $check3 = "selected";
                                            break;
                                        
                                        case '2':
                                            $check4 = "selected";
                                            break;   

                                        case '3':
                                            $check5 = "selected";
                                            break;     

                                    }


                                    ?>


                                    <option value="1"<?php echo $check1 ?>>MG</option>
                                    <option value="2" <?php echo $check2 ?> >SP</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cidade</label>
                                <select name="cidade" id="cidade" class="form-control">
                                    <option >Selecione</option>
                                    <option value="1" <?php echo $check3 ?>>Pará de Minas</option>
                                    <option value="2" <?php echo $check4 ?>>Belo horizonte</option>
                                    <option value="3" <?php echo $check5 ?>>Santos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Empresa</label>
                                    <input type="text" name="empresa" value="<?php echo $result['EMPRESA'] ?>" class="form-control" id="empresa" placeholder="Digite o nome da empresa do Serviço">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Filial</label>
                                    <input type="text" name="filial" value="<?php echo $result['FILIAL'] ?>" class="form-control" id="filial" placeholder="Digite o nome da Filial que precisa do servico">
                                </div>
                         </div>
                           
                        
                        <div class="form-group">
                            <label>Observação</label>
                            <textarea name="regserv"  rows="5" class="form-control" id="regserv" placeholder="Registre sua solicitação de Serviço"><?php echo $result['REGSERV'] ?></textarea>
                        </div>
                        <button type="submit" name="sendCadastro" class="btn btn-warning" value="cadastrar">Salvar</button>
                    </form>
                </div>
            </div>    
        </div> 
        
         <!-- Modal, apagar usuarios -->
        <div class="modal fade" id="apagarModal" tabindex="-1" role="dialog" aria-labelledby="apagarModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="apagarModalLabel">Exlcuir usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Tem certeza que deseja exlcuir o usuario selecionado?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Apagar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim da modal apagar usuarios -->
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="js/dashboard.js"></script>
    </body>
</html>