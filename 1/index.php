<?php

if (isset($_REQUEST["string"])) {
    $person_name = $_POST['string'];
    $age = $_POST['age'];
    $url = "https://reqbin.com/echo/post/json";

    //инициализация
    $curl = curl_init($url);
    //указываем параметры, включая url
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLINFO_HEADER, 0);

    $data = array("personName"=> $person_name, 'age' => $age);

    $post_data = json_encode($data);
    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($curl);

    if ($output === false) {
        echo "cURL Error:".curl_error($curl);
    } else echo "message: successful";
//    print_r($output);
    //закрываем соединение
    curl_close($curl);
}
?>

