<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    protected $_ci;
    protected $email_pengirim = 'mahakaryaagropertiwi.co.id'; // Isikan dengan email pengirim
    protected $nama_pengirim = 'Mahakaryaagro'; // Isikan dengan nama pengirim
    protected $password = 'Y86Ku7yZoJSR'; // Isikan dengan password email pengirim
    public function __construct(){
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        require_once(APPPATH.'PHPMailer-master/src/Exception.php');
        require_once(APPPATH.'PHPMailer-master/src/PHPMailer.php');
        require_once(APPPATH.'PHPMailer-master/src/SMTP.php');
    }
    public function send($data){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'mail.smtp2go.com';
        $mail->Username = $this->email_pengirim; // Email Pengirim
        $mail->Password = $this->password; // Isikan dengan Password email pengirim
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
        $mail->addAddress($data['email'], '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
        $mail->Subject = 'Email Pengunjung Website';
        $mail->Body = $data['content'];
        $send = $mail->send();
        if($send){ // Jika Email berhasil dikirim
            $response = array('status'=>'Sukses', 'message'=>'Email berhasil dikirim');
        }else{ // Jika Email Gagal dikirim
            $response = array('status'=>'Gagal', 'message'=>'Email gagal dikirim');
        }
        return $response;
    }
}