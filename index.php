<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "firstech";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  if(empty($name) || empty($email) || empty($message)) {
    $status = "Todos os campos devem estar preemchidos.";
  } else {
    if(strlen($name) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $name)) {
      $status = "Digite um nome valido";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $status = "Please enter a valid email";
    } else {

      $sql = "INSERT INTO contactinfo (name, email, message) VALUES (:name, :email, :message)";

      $stmt = $pdo->prepare($sql);

      $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);

      $status = "A sua mensagem foi enviada";
      $name = "";
      $email = "";
      $message = "";
    }
  }

}

?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>First Tech</title>
  </head>

  <body onload="slide1()">
    <header>

      <nav>
        <div class="nav-wrapper grey darken-4">
          <a href="" class="brand-logo">First Tech <i class="Large material-icons">computer</i></a>
          <a href="" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li><a href="#someCardPanels">Quem Somos</a></li>
            <li><a href="#Sobre">Sobre</a></li>
            <li><a href="#Serviços">Serviços </a></li>
            <li><a href="#Sobre">Contactos</a></li>
            <li><a href="#">Dicas</a></li>
            <li><a  href="login.php" class="blue waves-light btn">Entrar <i class="material-icons right">account_circle</i></a></li>
          </ul>
          <ul class="sidenav" id="mobile-menu">
          <li><a  href="login.php" class="blue waves-light btn">Entrar <i class="material-icons right">account_circle</i></a></li>
            <li><a href="#someCardPanels">Quem Somos</a></li>
            <li><a href="#Sobre">Sobre</a></li>
            <li><a href="#Serviços">Serviços</a></li>
            <li><a href="#Sobre">Contactos</a></li>
             <li><a href="#">Dicas</a></li>
          </ul>

      </nav>
      </div>
    </header>

    <main>

      <div class="parallax-container col s12 m12 l12">
        <div class="parallax"><img class="responsive-img" src="slide/marsh.jpg" alt="slide show" id="banner"></div>
      </div>
      <div class="col s12">
        <h1 class="center-align section scrollspy red text-lighten-3" id="someCardPanels">Seja bem-vindo ao Firstech site de tecnologia, O Que Fazemos? Web Designer, CCnA, Assistência Remota, Reparação de computadores e Cursos!</h1>
      </div>
      <div class="row">
        <div class="col s12 m4 l4">
          <div class="card-panel  blue-grey darken-4">
            <span class="white-text">
             <h5> Seguranca em TI <i class="Large Sizes:6rem material-icons">build</i></h5>
             <p>Prestacao de servico na area de seguranca em redes</p>
            </span>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card-panel blue-grey darken-4">
            <span class="white-text">
             <h5>Desenvolvimento Web <i class="Large Sizes:6rem material-icons">border_color</i></h5>
             <p>Criacao de sites para a sua Empresa</p>
            </span>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card-panel blue-grey darken-4">
            <span class="white-text">
             <h5> Assistencia remota em TI <i class="Large Sizes:6rem material-icons">devices</i></h5>
             <p>Melhor site para uma assistencia remota</p>
            </span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m6 l6">
          <div class="card large blue-grey darken-4">
            <div class="card-image">
              <img src="img/da6pwgn-1d8ab330-283c-4d2b-90b9-4de4ea8d4cf5.png" alt="">
              <span class="card-title">Instalacao de sistemas e o softwares utilitarios</span>
            </div>
              <span class="white-text">
            <div class="card-content">
              <p>Windows 10 é um sistema operacional da Microsoft, e atualmente a principal versão do Windows. Sua primeira versão de testes foi lançada a 1 de outubro de 2014 e apresentou uma série de mudanças em relação ao seu predecessor, o Windows 8.1. Entre elas, estão a volta do menu Iniciar, múltiplos ambientes de trabalho, novo navegador (Microsoft Edge), aplicativos renovados (Foto, Vídeo, Música, Loja, Outlook, Office Mobile e até o prompt de comando) e da união das múltiplas plataformas (inclusive o App Xbox)</p>
                </span>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l6">
          <div class="card large blue-grey darken-4">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/equipamentos.jpg" alt="">
            </div>
            <div class="card-content">
              <span class="card-title activator">Assistencia Remota <i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
              <span class="card-title">Precisa de ajuda? <i class="material-icons right">close</i></span>
              <p>Uma grande parte dos utilizadores dos meios informáticos não domina alguns problemas e funcionalidades que os sistemas operativos apresentam. Também têm algumas dificuldades em resolver determinadas situações que ocorrem na utilização dos computadores, o que é perfeitamente normal. Pedir ajuda a alguém é uma forma de ultrapassar esses problemas e pode ser um amigo, um colega ou mesmo um técnico especializado… e estes nem precisam de se deslocar junto do computador.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12">
        <h4 class="center-align section scrollspy" id="Sobre">Sobre</h4>
      </div>
      <div class="parallax-container">
        <div class="parallax">
          <img src="img/website-development.jpg" alt="">
        </div>
      </div>
      <div class="col s12 m12 l12">
        <p class="center-align">Somos uma empresa de assistencia tecnica e prestacao de servicos na area de TI- Tecnologia de informacao. prestamos os siguintes servicos:
        Seguranca em rede(CCNA RS), Hardware(manuntencao de computadores e diagnostico), software(Instalacao de todo tipo de sistema operativo e os respectivos softwares utilitarios) Web Designer
        (Criacao de paginas web criativas e dinamicas- Wordpress, joomla, Html,css,javascrip,php, ).<br><br>
        Estamos abertos de Segunda a Sábado para melhor atende-los. Horário de Segunda a Sexta-feira das: 09:00 as 18:00 - Sábados: 09:00 ao Meio dia. Venha nos visitar enquanto fazemos seu orçamento ou consertamos seu aparelho.<br>
        Manutenção e Conserto de Notebook Recuperação e Backup de Dados Manutenção Preventiva Troca de peças e Compontentes Otimização e Recuperação de equipamentos. Baterias e Carregadores para Notebooks Consultoria para aquisição de Notebook<br>
      Contate nossa assistência técnica especializada em notebook, laptop e PC. A equipe da Fisrtech é composta por profissionais e técnicos em informática para que o diagnóstico seja preciso. Desta forma encontramos as melhores soluções para todos os tipos de problemas e defeitos. Isso leva a um serviço de excelência, mais rápido e com menor custo possível.</p>
      </div>

      <div class="col s12">
        <h4 class="center-align section scrollspy" id="Serviços"><strong>Serviços</strong></h4>
      </div>

      <div class="row">
        <div class="col s12 m4 l4">
          <div class="card sticky-action">
            <div class="card large white">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/word.png" alt="">
            </div>
            <div class="card-content">
              <span class="card-title activator yellow">Rápido e fácil  <i class="material-icons right">more_vert</i></span>
                <!-- Modal Trigger -->
        <button data-target="modal1" class="btn center modal-trigger">Contactar</button>

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
         <div class="container">
    <h1>Contacte Aqui</h1>

    <form action="" method="POST" class="main-form">
      <div class="form-group">
        <label for="name">Nome completo</label>
        <input type="text" name="name" id="name" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>">
      </div>

      <div class="form-group">
        <label for="message">Sua menssagem</label>
        <textarea name="message" id="message" cols="30" rows="10"
          class="gt-input gt-text"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $message ?></textarea>
      </div>

      <input type="submit" class="gt-button" value="Enviar">

      <div class="form-status">
        <?php echo $status ?>
      </div>
    </form>
  </div>
        <!--Modal Footer-->
</div>
    </div>



            </div>
            <div class="card-reveal large">
              <span class="card-title">CCNA R&S<i class="material-icons right">close</i></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, quia illo. Provident omnis neque perspiciatis!</p>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card sticky-action">
<div class="card large white">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/ccna.jpg" alt="">
            </div>
            <div class="card-content">
              <span class="card-title activator  red accent-3">Segurança em Rede<i class="material-icons right">more_vert</i></span>

        <!-- Modal Trigger -->
        <button data-target="modal1" class="btn center modal-trigger">Contactar</button>

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
         <div class="container">
    <h1>Contacte Aqui</h1>

    <form action="" method="POST" class="main-form">
      <div class="form-group">
        <label for="name">Nome completo</label>
        <input type="text" name="name" id="name" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>">
      </div>

      <div class="form-group">
        <label for="message">Sua menssagem</label>
        <textarea name="message" id="message" cols="30" rows="10"
          class="gt-input gt-text"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $message ?></textarea>
      </div>

      <input type="submit" class="gt-button" value="Submit">

      <div class="form-status">
        <?php echo $status ?>
      </div>
    </form>
  </div>
        <!--Modal Footer-->
        <div class="orange modal-footer">
            <a href="#!" id="agreeBtn" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            <a href="#!" id="disagreeBtn"
               class="modal-action modal-close waves-effect waves-green btn-flat ">Disagree</a>

        </div>
    </div>
</div>
    </div>
            <div class="card-reveal large">
              <span class="card-title">CCNA R&S <i class="material-icons right">close</i></span>
              <p>CCNA R&S ® é uma certificação do fabricante Cisco, nos podemos instalar, configurar, operar e solucionar problemas em redes de tamanho médio e Avançado  compostas por Roteadores e Switches, incluindo a implementação e verificação de conexões para sites ou unidades remotas conectadas via uma rede </p>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card sticky-action">
            <div class="card large white">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/programacao-ilustracao.jpg" alt="">
            </div>
            <div class="card-content">
              <span class="card-title activator  blue lighten-1">Desenvolvimento de Sistemas <i class="material-icons right">more_vert</i></span>
               <!-- Modal Trigger -->
        <button data-target="modal1" class="btn center modal-trigger">Contactar</button>

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <!--Modal header-->
             <div class="container">
    <h1>Contacte Aqui</h1>

    <form action="" method="POST" class="main-form">
      <div class="form-group">
        <label for="name">Nome completo</label>
        <input type="text" name="name" id="name" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>">
      </div>

      <div class="form-group">
        <label for="message">Sua menssagem</label>
        <textarea name="message" id="message" cols="30" rows="10"
          class="gt-input gt-text"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $message ?></textarea>
      </div>

      <input type="submit" class="gt-button" value="Submit">

      <div class="form-status">
        <?php echo $status ?>
      </div>
    </form>
  </div>
        <!--Modal Footer-->
        <div class="orange modal-footer">
            <a href="#!" id="agreeBtn" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            <a href="#!" id="disagreeBtn"
               class="modal-action modal-close waves-effect waves-green btn-flat ">Disagree</a>

        </div>
    </div>

            </div>
            <div class="card-reveal large">
              <span class="card-title">Desenvolvimento de Sistemas de Informação<i class="material-icons right">close</i></span>
                    <p>Análise de requisitos e especificação de hardware e software para sistemas de informação.
      <br>Modelagem de sistemas de informação, de produtos, processos e organização, utilizando técnicas de análise orientada a objeto. <br>
      Desenvolvimento de sistemas de informação utilizando metodologias ágeis. <br>
      Testes, integração, instalação e administração de sistemas de informação. <br>
      Documentação de sistemas de informação.
      Projeto e Desenvolvimento de web sites.</p>
            </div>
          </div>
        </div>
          </div>
      </div>
    </main>

    <footer class="page-footer grey darken-4">
      <div class="container">
        <div class="row">

          <div class="col s10 m11 footer-items">
            <div class="row">
            <div class="col s12 m6 l3">
              <ul>
                <li class="red text-lighten-3">SUPORTE</li>
                <li><a class="red-text text-lighten-1" href="#!">Contact Us</a></li>
                <li><a class="red-text text-lighten-3" href="#!">Centro de Ajuda</a></li>
                <li><a class="red-text text-lighten-3" href="#!">Doação</a></li>
              </ul>
            </div>
            <div class="col s12 m6 l3">
              <ul>
                <li class="red text-lighten-3">Parceiros</li>
                <li><a class="tealtext text- darken-4" href="#!">First jr</a></li>
                <li><a class="green-text text- accent-2" href="#!">BSA</a></li>
                <li><a class="cyan-text text-accent-3" href="#!">New Vision</a></li>
              </ul>
            </div>
            <div class="col s12 m6 l3  company-info">
              <ul>
                <li class="red text-lighten-3">Categoria</li>
                <li><a class="red-text text-lighten-1" href="#!">Assistencia Tecnica em Informatica</a></li>
                <li><a class="red-text text-lighten-3" href="#!">Manutenção e reparação de computadores</a></li>
                <li><a class="red-text text-lighten-3" href="#!">Criação de Sites </a></li>

              </ul>
            </div>
            <div class="col s12 m6 l3">
              <ul>
                <li class="red text-lighten-3">Redes Socias</li>



                <li><a class="blue-text text-darken-3" href="#!">Facebook</a></li>
                <li><a class="pink-text text-lighten-3" href="#!">Instagram</a></li>
                <li><a class="green-text text-accent-3" href="#!">Whatsaap</a></li>
                <li><a class="light-blue-text text-accent-3" href="#!">Twitter</a></li>


              </ul>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="footer-copyright black">
        <div class="container very-small-text">
          <div class="col s1">
          </div>
          <div class="col s11 copyright">
            Copyright © 2019 First Tech, Limitada . Todos Os direitos reservados. First Tech parceiro e membro do grupo First jr, LTDA.
            <br>
                  <br>

            <a class="grey-text text-lighten-4 right-padding right-line" href="#!">
              Termos de Uso
            </a>
            <a class="grey-text text-lighten-4 side-padding right-line" href="#!">
              Termos adicionais
            </a>
            <a class="grey-text text-lighten-4 side-padding right-line" href="#!">
              Politica de Privacidade
            </a>
            <a class="grey-text text-lighten-4 side-padding right-line" href="#!">
              First jr
            </a>
            <a class="grey-text text-lighten-4 side-padding" href="#!">
              Maputo cidade
            </a>

          </div>
        </div>
      </div>
    </footer>
    <script src='script.js'></script>
    <script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
<script src="js/efeito.js"></script>
    <script src="js/main1.js"></script>
    <script src="js/costum.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="materialize/js/materialize.min.js"></script>
  </body>
</html>
