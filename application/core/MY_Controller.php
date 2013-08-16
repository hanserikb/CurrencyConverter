<?php

class MY_Controller extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    protected function getInput()
    {
        // Fetch input data
        $this->data = [
            "from" => $this->input->post('from', TRUE),
            "to" => $this->input->post('to', TRUE),
            "amount" => $this->input->post('amount', TRUE),
            "email" => $this->input->post('email', TRUE),
            "result" => $this->input->post('result', TRUE)
        ];
    }
}
