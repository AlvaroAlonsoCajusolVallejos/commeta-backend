<?php

$rs = [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],
    ],

];

/* 
ftp
'port' => 21,
'root' => '',
'passive' => true,
'ssl' => true,
'timeout' => 30,

sftp
'port' => 22,
'passphrase' => '',
'root' => '',
'timeout' => 30,
'directoryPerm' => 30,
*/
/*
function abrirConexion() {
    $dbLink = null;
    $servidor = env("DB_CONNECTION") . ":host=" . env("DB_HOST") . ";port=" . env("DB_PORT") . ";dbname=" . env("DB_DATABASE");
    $usuario = env("DB_USERNAME");
    $clave = env("DB_PASSWORD");
    try {
        $dbLink = new PDO($servidor, $usuario, $clave);
        $dbLink->exec("SET NAMES 'utf8';");
        $dbLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
    return $dbLink;
}

$sql = "SELECT s.*, st.nombre as tipo_str FROM server s INNER JOIN server_tipo st ON (st.id = s.tipo) WHERE s.estado = '1' AND tipo NOT IN (4);";
$sentencia = abrirConexion()->prepare($sql);
$sentencia->execute();
$servers = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach ($servers as $i => $sv) {
    switch ($sv["tipo_str"]) {
        case 'ftp':
            $rs["disks"]["sv".$sv["id"]] = [
                'driver' => $sv["tipo_str"],
                'host' => $sv["host"],
                'username' => $sv["user"],
                // 'permPublic' => 0755,
            ];
            if(!empty($sv["pass"])){
                $rs["disks"]["sv".$sv["id"]]['password'] = $sv["pass"];
            }
            if(!empty($sv["port"])){
                $rs["disks"]["sv".$sv["id"]]['port'] = $sv["port"];
            }
            break;
        case 'sftp':
            $rs["disks"]["sv".$sv["id"]] = [
                'driver' => $sv["tipo_str"],
                'host' => $sv["host"],
                'username' => $sv["user"],
                // 'permPublic' => 0755,
            ];
            if(!empty($sv["pkey"])){
                $rs["disks"]["sv".$sv["id"]]['privateKey'] = storage_path("app/public/server/".$sv["id"].".ppk");
            }
            if(!empty($sv["pass"])){
                $rs["disks"]["sv".$sv["id"]]['password'] = $sv["pass"];
            }
            if(!empty($sv["port"])){
                $rs["disks"]["sv".$sv["id"]]['port'] = $sv["port"];
            }
            break;
        case 's3':
            $rs["disks"]["sv".$sv["id"]] = [
                'driver' => $sv["tipo_str"],
                'key' => $sv["pkey"],
                'secret' => $sv["pass"],
                'region' => $sv["region"],
                'bucket' => $sv["user"],
                'endpoint' => $sv["host"],
                // 'permPublic' => 0755,
            ];
            break;
    }
}
*/
return $rs;