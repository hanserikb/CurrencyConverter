<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Currency Convertion</title>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.0.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/handlebars.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/spin.min.js'); ?>"></script>

        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui-1.10.3.custom.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    </head>
    <body>
        <div id="dialog"></div>
        <div class="container">
            <div class="main">
                <h1>Currency Converter</h1>
                <form action="/convert/doConvert" id="convert-form">
                    <input type="text" name="amount" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
                    <select name="from" id="from" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
                        <option value="AUD">AUD</option>
                        <option value="CAD">CAD</option>
                        <option value="CHF">CHF</option>
                        <option value="DKK">DKK</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="HKD">HKD</option>
                        <option value="MXN">MXN</option>
                        <option value="NZD">NZD</option>
                        <option value="PHP">PHP</option>
                        <option value="SEK" selected>SEK</option>
                        <option value="SGD">SGD</option>
                        <option value="THB">THB</option>
                        <option value="USD">USD</option>
                        <option value="ZAR">ZAR</option>
                    </select>
                    to
                    <select name="to" id="to" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
                        <option value="AUD">AUD</option>
                        <option value="CAD">CAD</option>
                        <option value="CHF">CHF</option>
                        <option value="DKK">DKK</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="HKD">HKD</option>
                        <option value="MXN">MXN</option>
                        <option value="NZD">NZD</option>
                        <option value="PHP">PHP</option>
                        <option value="SEK">SEK</option>
                        <option value="SGD">SGD</option>
                        <option value="THB">THB</option>
                        <option value="USD" selected>USD</option>
                        <option value="ZAR">ZAR</option>
                    </select>

                    <button type="submit" role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
                        <span class="ui-button-text">Convert</span>
                    </button>

                </form>
            </div>
        </div>
        <div class="bottom">
            <p>Created by: Hans Bentlöv <span>hans@bentlov.se</span></p>
        </div>
        <script type="text/javascript" src="<?php echo base_url('assets/js/convert.js'); ?>"></script>

        <!-- Handlebars template for the results -->
        <script id="result-dialog-template" type="text/x-handlebars-template">
          <p><span class="srcAmount">{{srcAmount}}</span> <span class="source">{{source}}</span>
          = <span class="resultAmount">{{amount}}</span> <span class="target">{{target}}</span></p>

          <p>You can send the result to your e-mail address if you wish!</p>
          <input type="email" placeholder="Email Address">
        </script>
    </body>
</html>
