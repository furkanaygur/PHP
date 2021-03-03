<?php require 'db.php';
$datas = $db->query('SELECT * FROM `data` ORDER BY id DESC LIMIT 0, 7')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoadMore</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#btn').on('click', function(e) {
                var lastData = $('#list li:last').data('id');
                $.post('ajax.php', {
                    'id': lastData
                }, function(response) {
                    if (response.hide) {
                        $('#btn').hide();
                    }
                    $('#list').append(response.html);
                }, 'json');
                e.preventDefault();
            });
        });
    </script>
</head>

<body>
    <ul id="list">
        <?php foreach ($datas as $data) :
            require 'items.php';
        endforeach; ?>
    </ul>
    <button id="btn">Load More</button>
</body>

</html>