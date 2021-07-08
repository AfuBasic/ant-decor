<?php
if($_POST && !empty($_POST)) {
        extract($_POST);
        $message = "There is a new contact message. Find the details below: <br /><br />
        Name: ".$name."<br />
        Email: ".$email."<br />
        Subject: ".$subject."<br />
        Message: ".$message."
        ";

        $api_key        = "0d030f5eabd09f4ca3ec8ba6f9e9cc56-65b08458-8c7bad7a";
        $domain         = "mg.faseaser.com";
        $ch             = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
                'from'                          => 'Ant Decorations <no-reply@antdecors.com>',
                'to'                            => "sevenseasneverdry70@outlook.com",
                'subject'                       => 'New Contact Message',
                'html'                          => $message
        ));

        curl_exec($ch);

        echo 1;
}