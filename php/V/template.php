<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css"
          integrity="sha512-UiVP2uTd2EwFRqPM4IzVXuSFAzw+Vo84jxICHVbOA1VZFUyr4a6giD9O3uvGPFIuB2p3iTnfDVLnkdY7D/SJJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
          integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= homeURL("favicon.ico") ?>" />
    <link rel="stylesheet" href="<?= homeURL("content/main.css") ?>"/>
    <link rel="stylesheet" href="<?= homeURL("content/search.css") ?>"/>
    <link rel="stylesheet" href="<?= homeURL("content/games.css") ?>"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <title><?= $title = "GameReview" ?></title>
</head>

<body>
<div id="global">
    <header>
        <a href="<?= homeURL("home") ?>">
            <h1 id="titleWebsite">game review website</h1>
        </a>
        <nav id="main-nav">
            <div class="container">
                <a href="<?= homeURL("home") ?>"><img id="logo" src="<?= homeURL("content/logo.jpg") ?>" alt="logo"></a>
                <ul>
                    <li><a href="<?= homeURL("home") ?>">Home</a></li>
                    <li><a href="<?= homeURL("games") ?>">All Games</a></li>
                    <li><a href="<?= homeURL("search") ?>">Search</a></li>
                    <li><a href="<?= homeURL("genre") ?>">Browse</a></li>
                </ul>
        </nav>
    </header>
    <main id="content-wrap">
        <?= $content ?>
    </main> <!-- #contenu -->
    <footer id="piedBlog">
        Rolecki - ESI - WEBR4 - 2021
    </footer>
</div> <!-- #global -->
<script>
    var home = '<?= homeURL() ?>'
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"
        integrity="sha512-UU0D/t+4/SgJpOeBYkY+lG16MaNF8aqmermRIz8dlmQhOlBnw6iQrnt4Ijty513WB3w+q4JO75IX03lDj6qQNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= homeURL("content/search.js") ?>"></script>
<script src="<?= homeURL("content/main.js") ?>"></script>
</body>
</html>