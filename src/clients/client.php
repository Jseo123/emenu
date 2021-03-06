<!DOCTYPE html>
<html>

<head>
    <title>Panel de cliente</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/adminLog.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body class="text-center">
    <main class="form-signin">
    <?php 
require_once "../htmls/admin-client-nav.html";
?>
        <form action="./Control/clientLog.php?logIn" method="POST">
            <h3 class="mb-3">POR FAVOR INICIE SESION</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="login-name" name="login-name">
                <label for="login-name">Usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="login-pass" name="login-pass">
                <label for="login-pass">contraseña</label>
            </div>
            <div class="mb-3">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">INICIAR SESION</button>
        </form>
    </main>
</body>

</html>