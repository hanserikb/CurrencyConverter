<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $configz = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => ''
        );

        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from('CurrencyConverter@foobar.com', 'Hans Bentlöv');
        $this->email->to('hanserikb@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();
    }
}

/* End of file email.php */
/* Location: ./application/controllers/email.php */
