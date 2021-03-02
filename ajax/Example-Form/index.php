<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form App</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script defer src="app.js"></script>
</head>

<body>
    <div id="alert-success" style="width: 100%; height: 30px;  text-align:center; background-color:green; color:white; display:none; margin-bottom:1rem; "></div>
    <div id="alert-err" style="width: 100%; height: 30px; text-align:center; background-color:red; color:white; display:none; margin-bottom:1rem; "></div>
    <form action="" method="FORM" id="form" onsubmit="return false;">
        <input type="text" name="username" id="username" placeholder="Username"> <br> <br>
        <input type="email" name="email" id="email" placeholder="Email"> <br> <br>
        <textarea name="message" id="message" placeholder="Message" cols="30" rows="10"></textarea> <br> <br>

        <button type="submit" id="btn" name="submitbtn">Submit</button>
    </form>

</body>

</html>