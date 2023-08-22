<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<%= csrfToken %>">

    <title>Document</title>
</head>
<body>
    <div>
        <?php
            if (DB::connection()->getPdo()) {
                echo "Successfully Connected to Database. Database name is: " . DB::connection()->getDatabaseName();
            }
        ?>
    </div>
</body>
</html>
