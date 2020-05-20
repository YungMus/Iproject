function togglePassword(checkbox, password) {

    // If the show password box is ticked
    if ($(checkbox).is(':checked')) {

        // Hide the actual password input
        $(password).hide();

        // Show the pseudo password text input
        $(password).next().show();

        // If the show password box is NOT ticked
    } else {

        // Show the actual password input again
        $(password).show();

        // Hide the pseudo password text input
        $(password).next().hide();

    }

}

function hideOnFocus(selector) {

    var checkboxId = '#show-password';
    var passwordId = '#password';
    var $selector = $(selector);
    var $password = $(passwordId);

    // If the input is empty
    if ($selector.val() == '') {

        // Show the label
        $selector.prev().stop(true, true).show();
    }

    // If this is an allowed password field
    if ($password.is('.password-input')) {

        // Get all the classes
        var classes = $password.attr('class');

        // Add a pseudo password text input and apply the classes
        $password.after('<input type="text" class="' + classes + '" value="" />');
    }

    // Toggle password input on DOM ready
    togglePassword(checkboxId, passwordId);

    // When clicking the checkbox
    $('.show-password').click(function () {
        // Toggle the password input
        togglePassword(checkboxId, passwordId);
    });

    // Bind focusin to the selector to account for input added to the DOM
    $selector.live('focusin', function () {

        // Cache $(this) for speed
        var $this = $(this);

        // Fade in the placeholder label - Use siblings as extra input added to DOM
        $this.siblings('.placeholder').stop(true, true).fadeOut(200);

        // If this is an allowed password field
        if ($this.is('.password-input')) {

            // Monitor the input on keyup
            $this.keyup(function () {

                // Add the value to each input
                // This is so the same text is in each (when showing / hiding pseudo password)
                $(passwordId).val($this.val());
                $(passwordId).next().val($this.val());

            });
        }

    });
    // On focus out, fade in label
    $selector.live('focusout', function () {

        // If the value is empty
        if (this.value == '') {

            // Fade in the placeholder label
            $(this).siblings('.placeholder').stop(true, true).fadeIn(200);
        }
    });
}
