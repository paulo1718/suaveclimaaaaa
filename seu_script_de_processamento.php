<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $mensagem = $_POST["mensagem"];

    // Dados para envio de email
    $destinatario = "marbelinhameg1@gmail.com"; // Substitua pelo seu endereço de email
    $assunto = "Nova mensagem do formulário de contato";

    // Construa o corpo do email
    $mensagem_email = "Nome: $nome\n";
    $mensagem_email .= "E-mail: $email\n";
    $mensagem_email .= "Telefone: $telefone\n";
    $mensagem_email .= "Mensagem:\n$mensagem\n";

    // Headers para o email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Use a função mail() para enviar o email
    if (mail($destinatario, $assunto, $mensagem_email, $headers)) {
        // Email enviado com sucesso
        header("Location: pagina-do-formulario.php?enviado=1");
        exit();
    } else {
        // Erro no envio do email
        echo "Erro ao enviar o email. Por favor, tente novamente mais tarde.";
    }
}
?>
