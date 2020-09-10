<?php
    require_once ("../../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exb - Orçamentos</title>
    <link rel="stylesheet" href="http://localhost/exbMarcenaria/views/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/exbMarcenaria/views/assets/css/styles.css">
</head>
    <body>
        <section id="login-main">
            <div class="container d-flex justify-content-center">
                <div class="login-wrapper d-flex flex-column justify-content-center align-items-center">
                    <div class="login d-flex flex-column">
                        <div class="login-header bg-dark-blue text-white d-flex justify-content-center align-items-center">
                            <h5>LOGIN</h5>
                        </div>
                        <?php
                            if(!empty($_SESSION['err'])){
                                echo $_SESSION['err'];
                                $_SESSION['err'] = "";
                            }
                        ?>
                        <div class="login-body">
                            <form method="POST" action="../../validacoes/loginAction.php">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
                                </div>
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>