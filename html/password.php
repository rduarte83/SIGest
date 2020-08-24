<?php
include_once '../php/session.php';

$old_password = $password = $confirm_password = "";
$old_password_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Introduza uma palavra-passe.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "A palavra-passe tem de conter pelo menos 8 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirme a palavra-passe.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "A palavra-passe não confere.";
        }
    }

    // Check input errors before inserting in database
    if (empty($password_err) && empty($confirm_password_err)) {

        //Check old password
        $sql = "SELECT password FROM users WHERE id = " . $_SESSION["id"];

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //Role
            $param_role = $_POST['role'];
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Ocorreu um erro. Tente mais tarde.";
            }
            // Close statement
            unset($stmt);
        }
    }
    // Close connection
    unset($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIGest | Alterar Palavra-passe</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php include '../header.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Alterar Palavra-passe</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                            <li class="breadcrumb-item active">Alterar Palavra-passe</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                  novalidate>
                                <div class="card-body">
                                    <!-- Insert Content Here -->
                                    <div class="form-group <?php echo (!empty($old_password_err)) ? 'has-error' : ''; ?>">
                                        <label>Actual Palavra-passe</label>
                                        <input type="password" name="old_password" class="form-control"
                                               value="<?php echo $old_password; ?>">
                                        <div class="invalid-feedback d-block"><?php echo $old_password_err; ?></div>
                                    </div>
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label>Nova Palavra-passe</label>
                                        <input type="password" name="password" class="form-control"
                                               value="<?php echo $password; ?>">
                                        <div class="invalid-feedback d-block"><?php echo $password_err; ?></div>
                                    </div>
                                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                        <label>Confirmar Nova Palavra-passe</label>
                                        <input type="password" name="confirm_password" class="form-control"
                                               value="<?php echo $confirm_password; ?>">
                                        <div class="invalid-feedback d-block"><?php echo $confirm_password_err; ?></div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="../index.php">
                                        <button type="button" class="btn btn-default ">Cancelar</button>
                                    </a>
                                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include '../footer.php' ?>
</div>
<!-- ./wrapper -->

<script src="../js/assistencias.js"></script>
</body>
</html>