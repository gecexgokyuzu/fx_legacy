<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/external/bootstrap/v5.3.3/bootstrap.min.css">
    <link rel="stylesheet" href="assets/external/jquery-json-view/v1.0.0/json-view.min.css">
    <link rel="stylesheet" href="assets/external/dataTables/v2.0.8/datatables.min.css">
    <link rel="stylesheet" href="assets/external/sweetalert2/v11.12.0/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/external/toastr/v2.1.3/toastr.min.css">

    <!-- INTERNAL CSS -->
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>

<body>
    <header>
        <?php echo $header; ?>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <?php include_once "templates/components/footer.php"; ?>

        <script src="assets/external/jquery/v3.7.1/jquery.min.js"></script>
        <script src="assets/external/bootstrap/v5.3.3/bootstrap.bundle.min.js"></script>
        <script src="assets/external/jquery-json-view/v1.0.0/json-view.min.js"></script>
        <script src="assets/external/dataTables/v2.0.8/datatables.min.js"></script>
        <script src="assets/external/sweetalert2/v11.12.0/sweetalert2.min.js"></script>
        <script src="assets/external/toastr/v2.1.3/toastr.min.js"></script>
        <script src="assets/internal/javascript/core.js"></script>
    </footer>
</body>

</html>