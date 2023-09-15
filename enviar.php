<?php
if (!empty($_POST["nome"]) && !empty($_POST["endereco"])) {

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $endereco = addslashes($_POST["endereco"]);
    $produto = addslashes($_POST["produto"]);

    //$email_to = "contato@similimusica.com.br";
    $email_to = "carlosxavier.dev@gmail.com";


    $assunto = "Formulário Simili Pianos";
    
    $header = 'MIME-Version: 1.1'."\r\n".
        'Content-type: text/html; charset=utf-8'."\r\n".
        'From: Simili Pianos <$email_to>'."\r\n".
        'Return-Path: $email_to'."\r\n".
        'Reply-To: $email'."\r\n".
        'X-Mailer: PHP/'.phpversion();
    

    // Dados que serao enviados.
    $body = "Nome: ".$nome." "."<br>"."\r\n".
        "E-mail: ".$email." "."<br>"."\r\n".
        "Telefone: ".$telefone." "."<br>"."\r\n".
        "Endereço: ".$endereco." "."<br>"."\r\n".
        "Produto: ".$produto;


    //Enviando o email.
    $status = mail($email_to, $assunto, $body, $header);


    if ($status) {
        
        header("Location: https://api.whatsapp.com/send?phone=5547999943130&text=Olá!%20Me%20chamo%20$nome,%20tenho%20interesse%20em%20seu%20Piano%20Yamaha%20exclusivo%20modelo%20$produto%20e%20gostaria%20de%20mais%20informações.");
           
        $email_obrigado = $email;
        $assunto_obrigado = 'Teste obrigado';
        $body_obrigado = 'Olá! É um prazer poder estar lhe atendendo, agradecemos por entrar em contato conosco e expressar seu interesse em nossos pianos.<br> Nossa equipe entrará em contato em breve para discutir suas necessidades e responder às suas perguntas.<br><br> Obrigado por escolher a Simili Pianos!<br> Enquanto isso, confira nossas redes e conheça mais sobre nós: 📱 Instagram: https://www.instagram.com/simili.pianos/';
        
        mail($email_obrigado, $assunto_obrigado, $body_obrigado, $header);

    } /*else {
       header("Location:contato.php?status=erro");

   }*/
}
?>