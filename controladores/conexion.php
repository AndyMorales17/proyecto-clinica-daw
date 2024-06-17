<?php
date_default_timezone_set('America/El_Salvador');


if (!defined('SERVIDOR')) define('SERVIDOR', 'localhost');
if (!defined('USUARIO')) define('USUARIO', 'root');
if (!defined('CLAVE')) define('CLAVE', '');
if (!defined('DATABASE')) define('DATABASE', 'FARMACIAMAZAPAN');



class conexion
{
    private $connect;
    public function __construct()
    {
        try 
        {
            $this -> connect= new mysqli(SERVIDOR, USUARIO, CLAVE, DATABASE);
        }
        catch(Exception $e)
        {
           echo $e;
        }
    }

    public function cn(){
    	return $this->connect;
    }

    public function ejecutarSQL($sql){
        return $this->cn()->query($sql);
    }

    public function encriptar($accion, $texto) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'farmaciamazapan';
        $secret_iv = 'C9FBL1EWSD/M8JFTGS';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
        if ($accion == 'encriptar') {
            $output = openssl_encrypt($texto, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);

        } else if ($accion == 'desencriptar') {
            $texto = base64_decode($texto); 
            $output = openssl_decrypt($texto, $encrypt_method, $key, 0, $iv);
        }
    
        return $output;
    }
    

}

