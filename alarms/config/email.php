<?php

// Um sistema de email baseado na função mail() do PHP costuma ser bloqueado por gestores de email pra evitar Spam.
// Isso deve ser substituito por uma biblioteca de gestão de emails.

class EmailManager {

    public function sendUrgentAlarmEmail($alarm,$equipment){
        $to = "abcd@abc.com.br";
        $subject = "Alarme Urgente Ativado.";
        $message = "O Alarme Urgente $alarm do Equipmamento $equipment foi acionado.";
        $headers = "MIME-Version: 1.0".
                   "\r\n".
                   "Content-type:text/html;charset=UTF-8".
                   "\r\n".
                   "From: <no-reply@alarm-system.com>".
                   "\r\n";

        mail($to, $subject, $message, $headers);
    }

}

$emailManager = new EmailManager();