<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Currency Convertion</title>
        <link rel="author" href="humans.txt">
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.0.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/handlebars.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/spin.min.js'); ?>"></script>

        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui-1.10.3.custom.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    </head>
    <body>
        <div id="dialog" title="Convertion Complete"></div>
        <div class="container">
            <div class="main">
                <h1>Currency Converter</h1>
                <form action="/convert/doConvert" id="convert_form">
                <input type="text" name="amount" class="ui-corner-all">
                <select name="from" id="from">
                    <option value="USD">USD</option>
                    <option value="SEK">SEK</option>
                    <option value="GBP">GBP</option>
                </select>
                to
                <select name="to" id="to">
                    <option value="USD"></option>
                    <option value="USD"></option>
                    <option value="USD"></option>
                </select>

                <button type="submit">Send</button>

                </form>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, officiis, voluptate culpa repellat molestias sit impedit illum fugit. Optio cumque et ducimus doloribus saepe consequatur alias soluta id nemo commodi!</p>
            </div>
        </div>
        <div class="bottom"></div>
        <script type="text/javascript" src="<?php echo base_url('assets/js/convert.js'); ?>"></script>

        <!-- Handlebars template for the results -->
        <script id="result-dialog-template" title="hej" type="text/x-handlebars-template">
          {{amount}}{{source}} = {{target}}
        </script>
    </body>
</html>
