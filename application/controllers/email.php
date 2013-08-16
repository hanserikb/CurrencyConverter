<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $config = Array(
            'mailtype' => 'html',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => '', // Enter gmail adress
            'smtp_pass' => '' // Enter gmail password
        );

        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from('CurrencyConverter@foobar.com', 'Hans Bentlöv');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Conversion made by the CurrencyConverter');

        $this->getInput();

        $this->email->message($this->load->view('email/email', $this->data, true));


        $this->email->send();
    }
}

/* End of file email.php */
/* Location: ./application/controllers/email.php */
