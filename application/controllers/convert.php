<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convert extends CI_Controller {

    private $api_key = "224cd8f6d9f9c8fb23bfc5a4432f8a91782b87f9";
    /*
        Currency API

        - Request url -
        http://currency-api.appspot.com/api/{source}/{target}.json?key={key}&amount={amount}

        - Response data -
        success Boolean     Whether the request was successful
        source  String(3)   Source currency code
        target  String(3)   Target currency code
        amount  Float       The converted amount (if applicable)
        rate    Float       Conversion rate
        message String(n)   A message accompanying errors
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('convert/convert');
    }

    public function convert()
    {
        // Fetch input variables
        $from = $this->input->post('from', TRUE);
        $to = $this->input->post('to', TRUE);
        $amount = $this->input->post('amount', TRUE);

        // Build URL
        $url = "http://currency-api.appspot.com/api/{$from}/{$to}.json?key={$this->api_key}&amount={$amount}";

        // Make API call and parse it
        $result = file_get_contents($url);

        // Set response content type to json and send the data
        $this->output->set_content_type('application/json')->set_output($result);

    }
}

/* End of file convert.php */
/* Location: ./application/controllers/convert.php */
