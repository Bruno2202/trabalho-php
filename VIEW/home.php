<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/default.css" />
    <link rel="stylesheet" href="./css/home.css" />
    <title>Sounds | Home</title>
</head>

<body>
    <div class="modalOverlay" id="modalOverlay">
        <input class="searchBar" placeholder="Pesquisar...">
        <span class="material-symbols-outlined closeSearchIcon" onclick="hideSeacrh()">
            close
        </span>
    </div>

    <div class="containter">
        <header class="header">
            <h1 class="app_name">SOUNDS</h1>
            <nav class="navigation">
                <a class="nav_option">VIOLINOS</a>
                <a class="nav_option">GUITARRAS</a>
                <a class="nav_option">PIANOS</a>
                <a class="nav_option">BATERIAS</a>
            </nav>
            <div class="nav_icons">
                <a href="./LOGIN/login.php" class="material-symbols-outlined">
                    person
                </a>
                <span class="material-symbols-outlined searchIcon" onclick="showSeacrh()">
                    search
                </span>
            </div>
        </header>

        <div id="carouselExample" class="carousel slide" style="width: 100vw;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../SRC/IMG/C3.png" class="d-block w-100" alt="C3">
                </div>
                <div class="carousel-item">
                    <img src="../SRC/IMG/C2.png" class="d-block w-100" alt="C2">
                </div>
                <div class="carousel-item">
                    <img src="../SRC/IMG/C1.png" class="d-block w-100" alt="C1">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="frame1">
            <h1>O próximo acorde!</h1>
            <p>Um upgrade nos instrumentos e nos equipamentos inspirarão músicos de todas as notas.</p>
        </div>

        <!-- <div class="frame2">
            <img class="frame2_img" src="../SRC/IMG/frame.png" alt="frame2">
        </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="./js/search.js"></script>
</body>

</html>