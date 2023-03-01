<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_COOKIE['show']) && $_COOKIE['show'] == 'yes') {
    echo 'yes';
} else {
    echo 'no';
}
?>

<button onclick="setCookie()">Set Cookie</button>
<button onclick="deleteCookie()">Delete Cookie</button>

<script>
    function setCookie() {
        document.cookie = 'show=yes';
        window.location.reload();
    }
    function deleteCookie() {
        document.cookie = 'show=; expires=Thu, 01 Jan 1970 00:00:00 GMT';
        window.location.reload();
    }
</script>

</body>
</html>
