<?php
// Content of create_deal.php

function sendDataToPipedrive($api_token, $URL, $data)
{


    $URL = $URL . '?api_token=' . $api_token;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $output = curl_exec($ch);
    curl_close($ch);
    return $result = json_decode($output, true);
}

if (!isset($_POST["nome"]))
    return;

$api_token = '43bdd95e34b3fe0e6a50f088e6185cd269a7150e';

$person = array(
    'name' => $_POST["nome"],
    'email' => $_POST["email"],
    'phone' => $_POST["telefone"],
    'adress' => $_POST["endereco"],
    'product' => $_POST["produto"],
);

$nome = addslashes($_POST['nome']);
$produto = addslashes($_POST["produto"]);

//AddPerson
$result = sendDataToPipedrive($api_token, 'https://similimusica.pipedrive.com/v1/persons', $person);


// Check if an ID came back, if did print it out
if (!empty($result['data']['id'])) {


    $deal = array(
        'title' => 'LP PIANO - ' . $_POST["nome"] . " - " . $_POST["email"] . " - " . $_POST["telefone"] . " - " . $_POST["telefone"] . " - " . $_POST["endereco"] . " - " . $_POST["produto"],
        'org_id' => '1',
        'person_id' => $result['data']['id']
    );


    $result = sendDataToPipedrive($api_token, 'https://similimusica.pipedrive.com/v1/deals', $deal);
    echo json_encode(array("return" => true, "id" => $result['data']['id']));



    header("Location: https://api.whatsapp.com/send?phone=5547999943130&text=Olá!%20Me%20chamo%20$nome,%20tenho%20interesse%20em%20seu%20Piano%20Yamaha%20exclusivo%20modelo%20$produto%20e%20gostaria%20de%20mais%20informações.");

    $email_obrigado = $email;
    $assunto_obrigado = 'A Simili Pianos agradece seu contato!';
    $body_obrigado = 'Olá! É um prazer poder estar lhe atendendo, agradecemos por entrar em contato conosco e expressar seu interesse em nossos pianos.<br> Nossa equipe entrará em contato em breve para discutir suas necessidades e responder às suas perguntas.<br><br> Obrigado por escolher a Simili Pianos!<br> Enquanto isso, confira nossas redes e conheça mais sobre nós: 📱 Instagram: https://www.instagram.com/simili.pianos/';

    mail($email_obrigado, $assunto_obrigado, $body_obrigado, $header);


}
