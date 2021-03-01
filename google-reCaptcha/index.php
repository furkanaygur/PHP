<script>
    var onloadCallback = function() {
        grecaptcha.render('security', {
            'sitekey': '<your_site_key>'
        });
    }
</script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl" async defer>
</script>



<form action="form.php" method="POST">
    <input type="text" name="name" placeholder="name"><br><br>
    <div id="security"></div><br><br>
    <button type="submit"> Submit</button>
</form>