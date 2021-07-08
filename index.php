<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Site para captura de emails">
        <meta name="author" content="Leonardo Duarte Mariano">
        <title>Cadastro de Emails</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        
        <h1 id="tituloPagina">Adquira seu E-book gratuito!</h1>

        <div id="divprincipal">
            <form action="<?php echo $_SERVER['PHP_SERVER']?>" method="POST">
                <label class="dados" for="nome">Nome</label>
                <br>
                <input required pattern=".{2,20}[a-zA-Z]+" id="nome" class="inputb" type="text" name="nome">
                <br>
                <label class="dados" for="sobreNome">Sobrenome</label>
                <br>
                <input required pattern=".{2,20}[a-zA-Z]" id="sobreNome" class="inputb" type="text" name="sobreNome">
                <br>
                <label class="dados" for="email">Email</label>
                <br>
                <input required id="email" class="inputb" type="email" name="email">
                <br>
                <label class="dados" for="">Telefone</label>
                <br>
                <input required id="numero" class="inputb" pattern=".{10,}[0-9]+" type="text" name="numero">
                <div id="divtermos">
                <input required id="checkPrivacidade" type="checkbox" name="checkPrivacidade">
                <label id="termos">Eu concordo com os termos de privacidade e segurança do serviço e
                estou ciente que posso cancelar o serviço a qualquer momento</label>
                </div>
                <input type="submit" name="enviar" id="enviar" value="Cadastrar">
            </form>

            <div id="beneficios">
                <h2>Com o E-book você aprenderá:</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Sed congue lectus non consectetur venenatis. Aenean sapien tortor,
                    commodo sed elementum eu, vestibulum aliquet erat. Pellentesque ut
                    arcu scelerisque dui volutpat rhoncus.</p>

                <img src="./img/broto.png" alt="" id="imgplanta">
            </div>
        </div>

        <?php
            if(isset($_POST['enviar'])){
                $registros = fopen("registros.txt","a+");
                $nome = $_POST['nome'];
                $sobreNome = $_POST['sobreNome'];
                $envairPara = $_POST['email'];
                $numero = $_POST['numero'];
                $linha = "$nome#$sobreNome#$envairPara#$numero";
                $linha = str_replace(' ', '', $linha);

                fwrite($registros,$linha."\n");
                
                $to_email = $_POST['email'];
                $subject = "** REGISTRO **";
                $body = "Olá,".$_POST['nome']." este é um email de Registro. Aqui está seu material grátis: http://www.rio.rj.gov.br/dlstatic/10112/4975980/4130120/ManualdeMudas2internet.pdf";
                $headers = "From: leo.mari.webhost@gmail.com";
                
                if (mail($to_email, $subject, $body, $headers)) {
                    echo "<h4>E-mail Enviado com Sucesso</h4>";
                } else {
                    echo "<h4>Falha no envio do email.</h4>";
                }

                header("location: index.php");
            }
        ?>

        <footer>
            <p>Copyright por Leonardo Duarte Mariano 2021</p>
        </footer>

    </body>
</html>