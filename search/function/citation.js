
    $(document).ready(function() {
      <?php
      if (empty($_SESSION['id'])) {
      ?>
        // Override Clipboard
        $('p').bind('cut copy paste', function(e) {
          alert('Cannot be Copied, Paste, Cut');
          e.preventDefault();
        });

        <?php
      } else if (!empty($_SESSION['id'])) {
        if ($_SESSION['subscribe'] == "No") {
        ?>
          // Override Clipboard
          $('p').bind('cut copy paste', function(e) {
            alert('Cannot be Copy, Paste, Cut');
            e.preventDefault();
          });

      <?php
        }
      }
      ?>
      //   copy restricted
      function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Copy Text to clipboard");
      }

      function myFunction1() {
        /* Get the text field */
        var copyText1 = document.getElementById("myInput1");

        /* Select the text field */
        copyText1.select();
        copyText1.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText1.value);

        /* Alert the copied text */
        alert("Copy Text to clipboard");
      }
    });