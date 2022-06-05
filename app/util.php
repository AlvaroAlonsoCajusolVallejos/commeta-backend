<?php

require_once 'configuracion/configuracion.php';

function encriptar($string) {
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr(KEY, ($i % strlen(KEY)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function desEncriptar($string) {
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr(KEY, ($i % strlen(KEY)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

function getIp() {
    return $_SERVER['REMOTE_ADDR'];
}

function getBrowser() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Microsoft Edge';
    elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif (strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera Mini";
    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif (strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif (strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    elseif (strpos($user_agent, 'Safari') !== FALSE)
        return "Safari";
    else
        return 'Otro';
}

function getPlatform() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $plataformas = array(
        'Windows 10' => 'Windows NT 10.0+',
        'Windows 8.1' => 'Windows NT 6.3+',
        'Windows 8' => 'Windows NT 6.2+',
        'Windows 7' => 'Windows NT 6.1+',
        'Windows Vista' => 'Windows NT 6.0+',
        'Windows XP' => 'Windows NT 5.1+',
        'Windows 2003' => 'Windows NT 5.2+',
        'Windows' => 'Windows otros',
        'iPhone' => 'iPhone',
        'iPad' => 'iPad',
        'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
        'Mac otros' => 'Macintosh',
        'Android' => 'Android',
        'BlackBerry' => 'BlackBerry',
        'Linux' => 'Linux',
    );
    foreach ($plataformas as $plataforma => $pattern) {
        if (preg_match('/' . $pattern . '/', $user_agent)) {
            return $plataforma;
        }
    }
    return 'Otras';
}

function getMovil() {
    if (getPlatform() == 'iPhone' || getPlatform() == 'iPad' || getPlatform() == 'Android') {
        return "movil";
    }
    return "web";
}

function getUbigeo() {
    require_once '../util/sinple_html_dom/simple_html_dom.php';
    $url = 'http://iplocationtools.com/ip_query.php?ip=' . $_SERVER['REMOTE_ADDR'];
    $html = file_get_html($url);
    $posts = $html->find('tbody > tr');
    $i = 1;
    foreach ($posts as $post) {
        if ($i < 2) {
            $link = $post->find('td', 0);
            $texto = explode("</div>", $link->innertext);
            $pais = explode("</span>", $texto[1]);
            $link = $post->find('td', 1);
            $ciudaad = explode("</div>", $link->innertext);
            $link = $post->find('td', 2);
            $texto = explode("</div>", $link->innertext);
            $distrito = explode("<div>", $texto[1]);
            $i++;
        }
    }
    return trim($distrito[0]) . " - " . trim($ciudaad[1]) . " - " . trim($pais[1]);
}

function getTimeStampNow() {
    $nowUtc = new DateTime('now', new DateTimeZone(ZONA_HORARIA));
    return $nowUtc->format('Y-m-d H:i:s');
}

function fecha() {
    $nowUtc = new DateTime('now', new DateTimeZone(ZONA_HORARIA));
    return $nowUtc->format('d-m-Y g:i A');
}

function changeDate($fecha) {
    $nowUtc = new DateTime($fecha, new DateTimeZone(ZONA_HORARIA));
    $fecha_parte = explode("-", $nowUtc->format('d-F-Y'));
    $fecha_str = $fecha_parte[0] . " de ";
    $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    for ($i = 0; $i < count($months); $i++) {
        if ($months[$i] == $fecha_parte[1]) {
            $fecha_str .= $meses[$i];
        }
    }
    $fecha_str .= " del " . $fecha_parte[2];
    return $fecha_str;
}

function intDia($dia) {
    $diaArray = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    for ($i = 0; $i < count($diaArray); $i++) {
        if ($diaArray[$i] === $dia) {
            return $i + 1;
        }
    }
}

function getDateNow() {
    $nowUtc = new DateTime('now', new DateTimeZone(ZONA_HORARIA));
    return $nowUtc->format('Y-m-d');
}

function getTime($string) {
    $nowUtc = new DateTime($string, new DateTimeZone(ZONA_HORARIA));
    return $nowUtc->format('H:i:s');
}

function getTimeNow() {
    $nowUtc = new DateTime('now', new DateTimeZone(ZONA_HORARIA));
    return $nowUtc->format('H:i:s');
}

function is_session_started() {
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function crearDirectorio($carpeta) {
//    $carpeta = 'documentos/' . 'exp2';
    if (!file_exists($carpeta)) {
        if (mkdir($carpeta, 0777)) {
            chmod($carpeta, 0777);
            return 'creado';
        } else {
            return 'error';
        }
    } else {
        return 'carpeta ya existe';
    }
}

function randomString($length) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-)(.:,;@_/\!|%$*+-{}[]"), 0, $length);
}

function filtrohtml($str) {
    return filter_var($str, FILTER_SANITIZE_STRING);
}

function filtroInt($int) {
    if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
        return true;
    } else {
        return FALSE;
    }
}

//function diasLaborables($dateStart, $dateEnd, $comparar = array("Saturday", "Sunday")) {
//    $diasLaborables = 0;
//    $starDate = new DateTime($dateStart);
//    $endDate = new DateTime($dateEnd);
//    while ($starDate <= $endDate) {
//        $validar = 0;
//        for ($i = 0; $i < count($comparar); $i++) {
//            if ($starDate->format('l') != $comparar[$i]) {
//                $validar++;
//            }
//        }
//        if ($validar == count($comparar)) {
//            $diasLaborables++;
//        }
//        $starDate->modify("+1 days");
//    }
//    return $diasLaborables;
//}
function diasLaborables($dateStart, $dateEnd, $comparar = array("Sunday")) {
    $diasLaborables = 0;
    $starDate = new DateTime($dateStart);
    $endDate = new DateTime($dateEnd);
    while ($starDate <= $endDate) {
        $validar = 0;
        for ($i = 0; $i < count($comparar); $i++) {
            if ($starDate->format('l') != $comparar[$i]) {
                $validar++;
            }
        }
        if ($validar == count($comparar)) {
            $diasLaborables++;
        }
        $starDate->modify("+1 days");
    }
    return $diasLaborables;
}

function diasNoLaborables($dateStart, $dateEnd, $comparar = array("Saturday", "Sunday")) {
    $diasNoLaborables = 0;
    $starDate = new DateTime($dateStart);
    $endDate = new DateTime($dateEnd);
    while ($starDate <= $endDate) {
        for ($i = 0; $i < count($comparar); $i++) {
            if ($starDate->format('l') == $comparar[$i]) {
                $diasNoLaborables++;
            }
        }
        $starDate->modify("+1 days");
    }
    return $diasNoLaborables;
}

/*
 * calcularFechaFin($dateStart, $dias, $comparar = array("Saturday", "Sunday"))
 */

function calcularFechaFin($dateStart, $dias, $comparar = array("Sunday")) {
    $starDate = new DateTime($dateStart);
    $fecha = new DateTime($dateStart);
    $contador = 0;
    for ($index = 1; $index < $dias; $index++) {
        $fecha->modify("+1 days");
        for ($i = 0; $i < count($comparar); $i++) {
            if ($fecha->format('l') == $comparar[$i]) {
                $contador++;
            }
        }
    }
    $dias = $dias + $contador;
    $starDate->modify("+$dias days");
    return $starDate->format("Y-m-d");
}

function ganttColor($p_color) {
    $color = "";
    switch ($p_color) {
        case "gtaskblue":
            $color = "rgba(65,154,214,0.6)";
            break;
        case "gtaskred":
            $color = "rgba(196,58,58,0.6)";
            break;
        case "gtaskgreen":
            $color = "rgba(80,193,58,0.6)";
            break;
        case "gtaskyellow":
            $color = "rgba(247,228,56,0.6)";
            break;
        case "gtaskpurple":
            $color = "rgba(193,58,193,0.6)";
            break;
        case "gtaskpink":
            $color = "rgba(249,177,245,0.6)";
            break;
    }
    return $color;
}

function sqlTime($time) {
    $addtime = "TIME_FORMAT(?,'%H:%i:%s')";
    if (explode(" ", $time)[1] == "PM" && explode(":", explode(" ", $time)[0])[0] != "12") {
        $addtime = "ADDTIME(TIME_FORMAT(?,'%H:%i:%s'), '12:00:00')";
    }
    return $addtime;
}

function agregar_zip($dir, $zip) {
    if (is_dir($dir)) {
        if ($da = opendir($dir)) {
            while (($archivo = readdir($da)) !== false) {
                if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {
                    agregar_zip($dir . $archivo . "/", $zip);
                } elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
                    $zip->addFile($dir . $archivo, $dir . $archivo);
                }
            }
            closedir($da);
        }
    }
}

function rmDir_rf($carpeta) {
    foreach (glob($carpeta . "/*") as $archivos_carpeta) {
        if (is_dir($archivos_carpeta)) {
            rmDir_rf($archivos_carpeta);
        } else {
            unlink($archivos_carpeta);
        }
    }
    rmdir($carpeta);
}

function postapi($url, $method, $body = null) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($method == "POST") {
        curl_setopt($ch, CURLOPT_POST, true);
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    if ($body != null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    if (curl_errno($ch)) {

    } else {
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }
    curl_close($ch);
    if ($data != false) {
        $result = json_decode($data);
        if ($result != null) {
            return $result;
        }
    }
    return false;
}

/*
  if (!is_dir('carpeta_copia')) {
  full_copy('copiar_esta/, 'carpeta_copia');
  }
 */

function full_copy($origen, $destino) {
    if (is_dir($origen)) {
        @mkdir($destino);
        $d = dir($origen);
        while (FALSE !== ($entry = $d->read())) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $Entry = $origen . '/' . $entry;
            if (is_dir($Entry)) {
                full_copy($Entry, $destino . '/' . $entry);
                continue;
            }
            copy($Entry, $destino . '/' . $entry);
        }
        $d->close();
    } else {
        copy($origen, $destino);
    }
}

function enviarMail($asunto, $encargados, $plantilla) {
    include_once "../util/phpmailer/class.phpmailer.php";
    include_once "../util/phpmailer/class.smtp.php";
    require '../util/sinple_html_dom/simple_html_dom.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = HOST_MAIL;
    $mail->Port = PORT_MAIL;
    $mail->SMTPSecure = SMTPSECURE;
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL_SUPPORT;
    $mail->Password = PWD_EMAIL_SUPPORT;
    $mail->setFrom($mail->Username, COMPANY_NAME);
    foreach ($encargados as $encargado) {
        $mail->addAddress($encargado["email"], $encargado["nombres"] . " " . $encargado["apellido_paterno"] . " " . $encargado["apellido_materno"]);
    }
    $mail->Subject = $asunto;
    $mail->msgHTML(utf8_decode(file_get_html(URL_BASE . 'plantillas/' . $plantilla)));
    return $mail->send();
}

?>
