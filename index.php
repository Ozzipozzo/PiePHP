<?php

require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));
define('BASE_URI', str_replace('\\', '/', substr( __DIR__ , strlen($_SERVER['DOCUMENT_ROOT'])))); // ===> /dev_env/PiePHP
define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR); // ====> /var/www/html/dev_env/PiePHP/
session_start();

// echo ROOT_PATH . '<br />';
$app = new Core\Core();
$app->run();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URI . '/webroot/css/reset.css'; ?>" />
    <link rel="stylesheet" href="<?= BASE_URI . '/webroot/css/style.css'; ?>" />
</head>
<body>
    <pre>
        <?php print_r($_GET); ?>
    </pre>
    <pre>
        <?php print_r($_POST); ?>
    </pre>
    <pre>
        <?php print_r($_SERVER); ?>
    </pre>
</body>
</html>