<?php

include_once '../Model/Email/EmailModel.php';
include_once '../Lib/Validate.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailController{

    private $objEmail;
    private $objPHPMailer;
    private $objValidate;

    public function __construct(){

        $this->objEmail = new EmailModel();
        $this->objPHPMailer =  new PHPMailer();
        $this->objValidate = new Validate();
        
    }

    public function getView()
    {
        include_once "../View/Email/form.php";
    }

    public function sendEmail(){

        if(isset($_POST)){

            $msm = $_POST['msm'];
            $correo = $_POST['correo'];

            $response['respo'] = array();
            $datos = array();

            if ($this->objValidate->v_email($_POST['correo'])) {


                try{
                    //configuracion servidor del correo
                    $this->objPHPMailer->SMTPDebug = 0;
                    $this->objPHPMailer->isSMTP();
                    $this->objPHPMailer->CharSet = 'UTF-8';
                    $this->objPHPMailer->Host="smtp.gmail.com";
                    $this->objPHPMailer->SMTPAuth=true;
                    $this->objPHPMailer->Username="guacamoles.tadsi@gmail.com";
                    $this->objPHPMailer->Password="guacamoles2068623";
                    $this->objPHPMailer->SMTPSecure="TLS";
                    $this->objPHPMailer->Port=587;
                    
                
                    //Remitente
                    $this->objPHPMailer->setFrom("guacamolesSIIT@gmail.com","Correo SENA SOFT-2021"); 
                
                    $this->objPHPMailer->addAddress($correo);
                    //Content
                    $this->objPHPMailer->isHTML(true);                                 
                    $this->objPHPMailer->Subject = 'Sena Soft-2021';
                    $this->objPHPMailer->Body    = $msm;
                
                    $this->objPHPMailer->send();
                    $r = "Correo Enviado";

                    $datos['error'] = false;
                    $datos['msm'] = $r;

                } catch (Exception $e) {
                    $r = "Correo no ennviado *error: {$this->objPHPMailer->ErrorInfo}";
                    $datos['error'] = true;
                    $datos['msm'] = $r;
                }
                

            }else{

                $r = 'Dirección de correo Invalida';
                $datos['error'] = true;
                $datos['msm'] = $r;
            }

            array_push($response['respo'], $datos);
            
            echo json_encode($response);
            
        }

    }
}