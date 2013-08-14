(function($) {
  var opts = {
    lines: 13, // The number of lines to draw
    length: 0, // The length of each line
    width: 9, // The line thickness
    radius: 27, // The radius of the inner circle
    corners: 1, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    direction: 1, // 1: clockwise, -1: counterclockwise
    color: '#000', // #rgb or #rrggbb
    speed: 0.7, // Rounds per second
    trail: 35, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: '250', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
  };

  var spinner = new Spinner(opts);

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
      data: form.serialize(),
      beforeSend: function() {
        // Show spinner
        var target = document.getElementById('convert_form');
        spinner.spin(target);
      },
      success: function(data) {
        console.log(data);

        var source   = $("#result-dialog-template").html();
        var theTemplate = Handlebars.compile(source);

        if (data.success) {
          // Fetch and compile the template
          var compiled = theTemplate(data);
          $('#dialog').html(compiled).dialog("open");
        } else {
          $('#dialog').html(data.message).dialog("open");
        }

      },
      error: function(jqXHR, message, errThrown) {
        $('#dialog').html(message).dialog("open");
      },
      complete: function() {
        // Remove spinner
        spinner.stop();
      }
    });
  });

})(jQuery);
