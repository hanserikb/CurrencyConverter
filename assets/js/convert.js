(function($) {
  $( "#dialog" ).dialog({ autoOpen: false });

  $('#convert_form').on('submit', function(e) {
    // Stop events
    e.preventDefault();
    e.stopPropagation();

    // Reference form
    var form = $(this);

    // Make ajax request
    $.ajax('http://localhost:80/CurrencyConverter/convert/doConvert', {
      type: 'POST',
      data: {
        from: "usd",
        to: "sek",
        amount: 200
      },
      ajaxStart: function() {
        // Show spinner
      },
      success: function(data) {
        console.log(data);

        var source   = $("#result-dialog-template").html();
        var theTemplate = Handlebars.compile(source);

        if (data.success) {
          // Fetch and compile the template
          data = { target: "usd", source: "sek", amount: 3000 };
          var compiled = theTemplate(data);
          $('#dialog').html(compiled).dialog("open");
        } else {
          $('#dialog').html("error").dialog("open");
        }

      },
      error: function(jqXHR, message, errThrown) {
        console.log(error);
        alert(message);
      },
      complete: function() {
        // Remove spinner
      }
    });
  });

})(jQuery);
