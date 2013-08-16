(function($) {
  // Spinner options
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

  // Referencing spinner and the form elements
  var spinner = new Spinner(opts);
  var form = $('#convert-form');
  var dropDowns = form.find('select');

  dropDowns.on('change', function() {
    /*
      When a select element is changed, it checks if the other select element
      has the same selected index. If it has; it changes the other's index.

      This prevents the user from sending the same input in the from/to select-fields.
     */

    // Get a reference to the other select-element
    var otherDropDown = $(this).siblings('select')[0];

    // If the other select-element is at its bottom option, go to the top option
    if (this.selectedIndex === otherDropDown.selectedIndex) {
      if (otherDropDown.selectedIndex == parseInt(otherDropDown.length)-1) {
        otherDropDown.selectedIndex = 0;
      }
      otherDropDown.selectedIndex = parseInt(otherDropDown.selectedIndex)+1;
    }
  });
  form.on('submit', function(e) {
    // Stop defaults and event bubbling
    e.preventDefault();
    e.stopPropagation();

    // Reference the input field
    var inputField = $('form').find('input[type="text"]')[0];

    // Make ajax request
    $.ajax('http://localhost:80/CurrencyConverter/convert/doConvert', {
      type: 'POST',
      data: form.serialize(),
      beforeSend: function() {

        // Show spinner
        showSpinner();

      },
      success: function(data) {

        // Compile template
        var source   = $("#result-dialog-template").html();
        var theTemplate = Handlebars.compile(source);

        if (data.success) {

          var compiled = theTemplate(data);
          $('#dialog').html(compiled).dialog({
            title: 'Conversion complete',
            modal: true,
            width: "auto",
            buttons: {
              'Email result': sendEmail,
              'New conversion': function() {
                $(this).dialog("close").html("");
                inputField.select();
              }
            }
          });

        } else {
          $('#dialog').html(data.message).dialog({
            title: 'An error occured',
            modal: true,
            buttons: {
              'Try again': function() {
                $(this).dialog('close').html("");
              }
            }
          });
        }

      },
      error: function(jqXHR, message, errThrown) {
        $('#dialog').html(message).dialog("open");
      },
      complete: function() {
        // Remove spinner
        hideSpinner();
      }
    });
  });

  function sendEmail() {
    $.ajax("http://localhost:80/CurrencyConverter/email", {
        data: form.serialize() + '&result=' + $('#dialog').find('.resultAmount').text()
          + "&email=" + $('#dialog').find('input').val(),
        beforeSend: showSpinner,
        success: function(data) {
          $("#dialog").dialog('close').html("");
          alert('Mail sent!');
        },
        complete: hideSpinner
    });
  }

  function showSpinner() {
    console.log('hi')
    var target = document.getElementById('convert-form');
    spinner.spin(target);
  }

  function hideSpinner() {
    spinner.stop();
  }
})(jQuery);
