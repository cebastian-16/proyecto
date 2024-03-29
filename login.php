<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {

        include 'controladorLogin.php';
        $login = new login;

        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $login->consultarLogin($username, $password);

            if (!$result) {
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "  <strong>Error!</strong> Usuario no existe o Contraseña invalida";
                echo "</div>";
            } else {
                //if (password_verify($password, $result['password'])) { ---revisar
                if ($password == $result['password']) {
                    $_SESSION['user_id'] = $result['username'];
                    echo "<div class='alert alert-success alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Excelente!</strong> Datos correctos.";
                    echo "</div>";
                    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
                } else {

                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> Usuario o Contraseña invalido";
                    echo "</div>";



                }
            }
        }

        ?>
        <form method="post" action="" name="signin-form">
            <div class="login-wrap">
                <div class="login-html">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                        class="tab">Bienvenido
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </label>

                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
                    <div class="login-form">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Usuario</label>
                                <input name="username" type="text" class="input" required>
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Contraseña</label>
                                <input name="password" type="password" class="input" data-type="password" required>
                            </div>
                            <div class="group">
                                <input type="submit" class="button"  name="login" value="Ingresar">
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    } else {
        header('Location: index.php');
        exit;
    }
    ?>

    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>