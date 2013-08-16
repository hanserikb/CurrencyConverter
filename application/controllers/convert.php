<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convert extends MY_Controller {

    private $api_key = "224cd8f6d9f9c8fb23bfc5a4432f8a91782b87f9";
    private $inputData;
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
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('convert/convert');
    }

    public function doConvert()
    {
        // Fetch input variables
        $this->getInput();

        // Make the request
        $result = $this->makeRequest();

        // Set response content type to json and send the data
        $this->output->set_content_type('application/json')->set_output($result);

    }

    private function makeRequest()
    {
        // Build URL
        $url = "http://currency-api.appspot.com/api/{$this->data['from']}/{$this->data['to']}.json?key={$this->api_key}&amount={$this->data['amount']}";
        // Make API call and parse it
        $result = file_get_contents($url);

        // Setting the inputted amount in the array
        $json = json_decode($result,true);
        $json['srcAmount'] = $this->data['amount'];

        return json_encode($json);
    }
}

/* End of file convert.php */
/* Location: ./application/controllers/convert.php */
