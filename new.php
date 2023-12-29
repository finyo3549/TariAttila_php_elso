
<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET)){?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felvétel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>
<div class="container-fluid mx-auto">
        <?php require_once("navbar.php"); ?>    
        </div>
        <br>
        <div class="container bg-light text-center"><h1>Új processzor felvétele</h1></div>
   <form action="new.php" method="GET">
   <div class="container">
<div> 
   <label class="form-label" for="processzorgyarto">Processzor gyártó</label>
    <input class="form-control" type="text" id="processzorgyarto" name="processzorgyarto" placeholder="Intel,AMD,..." required>
</div>
<div> 
   <label class="form-label" for="processzor_tipus">Processzor típus</label>
    <input class="form-control" type="text" id="processzor_tipus" name="processzor_tipus" placeholder="Pentium, Opteron,..." required>
</div>
<div> 
   <label class="form-label" for="orajel">Órajel</label>
    <input class="form-control" type="double" id="orajel" name="orajel" placeholder="órajel in GHz" required>
</div>
<div> 
   <label class="form-label" for="architektura">Architektúra</label>
    <input class="form-control" type="text" id="architektura" name="architektura" placeholder="'x86-64', 'x86', 'AMD64', 'IA64'"required>
</div>
<div> 
   <label class="form-label" for="kibocsajtas">Kibocsájtás éve</label>
    <input class="form-control" type="number" id="kibocsajtas" name="kibocsajtas" placeholder="Év" min="1900" max="2100" required>
</div>

<br>
<button class="btn btn-outline-success" type="submit">Új processzor felvétele</button>
</div>
</form>

</body>
</html>
<?php
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    $error = [];
    if (!isset($_GET["processzorgyarto"]) || empty($_GET["processzorgyarto"])) {
        $error[] = "Processzor gyártó hiányzik";
    }
    if (!isset($_GET["processzor_tipus"]) || empty($_GET["processzor_tipus"])) {
        $error[] = "processzor_tipus hiányzik";
    }
    if (!isset($_GET["orajel"]) || empty($_GET["orajel"])) {
        $error[] = "Órajel hiányzik";
    }
    if (!isset($_GET["architektura"]) || empty($_GET["architektura"])) {
        $error[] = "Architektúra hiányzik";
    }
    elseif($_GET['architektura'] !='x86' && $_GET['architektura'] !='x86-64' && $_GET['architektura'] !='AMD64' && $_GET['architektura'] !='IA64') {
        $error[] = 'Hibás architektúra';
    }
    if (!isset($_GET["kibocsajtas"])|| empty($_GET["kibocsajtas"])) {
        $error[] = "Kibocsájtási év hiányzik ";
    }
    if (empty($error)) {
        require_once("query.php");
        $processzor = new Query();
        if ($processzor->createNew($_GET)) {
            header("Location: http://localhost:8080?success=true", true, 301);
        } else {
            header("Location: http://localhost:8080?success=false", true, 301);
        };
    } else {
        echo "Hiba a form kitöltésénél<br>";
        foreach ($error as $msg) {
            echo "" . $msg . "";
        }
    }
}
?>

