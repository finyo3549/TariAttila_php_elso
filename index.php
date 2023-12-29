<?php
$alertMessage = '';
$alertClass = '';
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['success'])) {
    if ($_GET['success'] == 'true') {
        $alertMessage = 'Sikeres felvétel';
        $alertClass = 'alert-success';
    } else {
        $alertMessage = 'Sikertelen felvétel';
        $alertClass = 'alert-danger';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fooldal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    require_once("db.php");
    require_once("query.php");
    $database = new Query();
    $processor = $database->listAll();
    ?>
    <main>
        <div class="container-fluid mx-auto">
            <?php require_once("navbar.php"); ?>
        </div>
        <main class="container mt-4">
        <?php if (!empty($alertMessage)) : ?>
            <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                <?php echo $alertMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <br>
        <div class="container">
            <table class="table table-striped">
                <thead class="table-success">
                    <tr>

                        <th>ID</th>
                        <th>Processzor Gyártó: </th>
                        <th>Processzor Típus: </th>
                        <th>Órajel: </th>
                        <th>Architektúra: </th>
                        <th>Kibocsájtás éve: </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($processor as $processor): ?>
                        <tr>
                            <td>
                                <?php echo $processor['id'] ?>
                            </td>
                            <td>
                                <?php echo $processor['processzor_gyarto'] ?>
                            </td>
                            <td>
                                <?php echo $processor['processzor_tipus'] ?>
                            </td>
                            <td>
                                <?php echo $processor['orajel'] ?>
                            </td>
                            <td>
                                <?php echo $processor['architektura'] ?>
                            </td>
                            <td>
                                <?php echo $processor['kibocsajtas'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>