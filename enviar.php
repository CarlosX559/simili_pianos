<?php
if (!empty($_POST["nome"]) && !empty($_POST["endereco"])) {

    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $endereco = addslashes($_POST["endereco"]);
    $produto = addslashes($_POST["produto"]);


    //$email_to = "contato@similimusica.com.br";
    $email_to = "carlosxavier.dev@gmail.com";

    $header = 'From: carlosxavier.dev@gmail.com'."\r\n".
        'Reply-To: carlosxavier.dev@gmail.com'."\r\n".
        'X-Mailer: PHP/'.phpversion();
    $assunto = "Formulario simili pianos";

    // Dados que serao enviados.
    $body = "Nome: ".$nome." ".
        "Telefone: ".$telefone." ".
        "Endereço: ".$endereco." ".
        "Produto: ".$produto;


    //Enviando o email.
    $status = mail($email_to, $assunto, $body, $header);


    if ($status) {
        header("Location: https://api.whatsapp.com/send?phone=5547999943130&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es%20sobre%20seus%20pianos%20exclusivos!%20$produto ");

    } /*else {
       header("Location:contato.php?status=erro");

   }*/
}
?>