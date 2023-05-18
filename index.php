<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Faculdade</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="index.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="main">


  <div class="container">
    <center>
      <div class="middle">
        <div id="login">

          <form action="/faculdade/conexao/login.php" method="POST" autocomplete="off">

            <fieldset class="clearfix">

              <p><span class="fa fa-user"></span><input name="nome" type="text" Placeholder="Usuário" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
              <p><span class="fa fa-lock"></span><input name="id" type="password" Placeholder="Senha" required></p> <!-- JS because of IE support; better: placeholder="Password" -->

              <div>
                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text">Senha = Matrícula</a></span>
                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Entrar"></span>
              </div>

            </fieldset>
            <div class="clearfix"></div>
          </form>

          <div class="clearfix"></div>

        </div> <!-- end login -->
        <div class="logo">
          <img src="/faculdade/foto.png" alt="">

          <div class="clearfix"></div>
        </div>

      </div>
    </center>
  </div>

</div>