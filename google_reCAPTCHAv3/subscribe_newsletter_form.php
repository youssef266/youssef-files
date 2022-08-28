<html>
    <head>
        <title>Subscrib to Newsletter </title>
        <link rel="stylesheet" href="./style.css" Type="text/css">
        <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
      <script src="https://www.google.com/recaptcha/api.js?render=6LeCvAAgAAAAALR1Q08q5wFNvJIe2APYXy5D17O8"></script>
    </head>
    <body>
        <div>
            <b>Subscribe Newsletter.</b>
        </div>
        <form id="newsletterForm" action="subscribe_newsletter_submit.php" method="post">
           <div>
               <div>
                   <input type="email" id="email" name="email">
               </div>
               <div>
                    <input type="submit" value="submit">      
               </div>
           </div> 
        </form>
        
       <script>
            $('#newsletterForm').submit(function(event) {
        event.preventDefault();
        var email = $('#email').val();
  
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCvAAgAAAAALR1Q08q5wFNvJIe2APYXy5D17O8', {action: 'subscribe_newsletter'}).then(function(token) {
                $('#newsletterForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#newsletterForm').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                $('#newsletterForm').unbind('submit').submit();
            });;
        });
  });
       </script> 
    </body>
</html>




