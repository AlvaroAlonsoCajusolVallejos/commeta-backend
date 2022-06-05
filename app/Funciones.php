<?php

namespace App;

use Exception;

class Funciones {

    public static function imprimeArray($state, $data, $message = '') {
        header("HTTP/1.1 " . $state);
        header('Content-Type: application/json');

        $response["state"] = $state;
        $response["message"] = $message;
        $response["data"] = $data;

        echo json_encode($response);
    }

    public static function requestCometaAPI($target, $json = true)
    {
        try {
            $ch = curl_init();
            if (strpos($target, 'https') !== false) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            }
            $header = ['hash: OcJn4jYChW'];
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $target);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result, true);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
