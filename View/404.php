<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="Assets/css/styles.css">
    </head>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
    </style>
    <?php
        include "Model/database.php";
    ?>
    <body>
        <h1>404</h1>
        <h2>page not found</h2>
        <a href="?request=login">go to home</a>
    </body>
</html>