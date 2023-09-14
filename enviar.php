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
    $body = "Nome: ".$nome." ".
        "E-mail: ".$email." ".
        "Telefone: ".$telefone." ".
        "Endereço: ".$endereco." ".
        "Produto: ".$produto;


    //Enviando o email.
    $status = mail($email_to, $assunto, $body, $header);


    if ($status) {
        header("Location: https://api.whatsapp.com/send?phone=5547999943130&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es%20sobre%20seus%20pianos%20exclusivos!");

        $email_obrigado = $email;
        $assunto_obrigado = 'Teste obrigado';
        $body_obrigado = 'Mensagem de obrigado';
        
        mail($email_obrigado, $assunto_obrigado, $body_obrigado, $header);

    } /*else {
       header("Location:contato.php?status=erro");

   }*/
}
?>