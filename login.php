<?php

include "Config/commandes.php";
session_start();

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['email']) && !empty($_POST['motdepasse'])) {
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);

        $admin = getAdmin($email, $motdepasse);

        if ($admin) {

            $_SESSION['xhTohTuzPbbsTtr71'] = $admin;

            header("Location: admin/MyDashboard/index.php");
        } else {
            echo "Les infos sont incorrectes";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login - Boot</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Vendor CSS Files -->
    <link href="admin/MyDashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="admin/MyDashboard/assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <div class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block">Admin</span>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    </div>
                                    <form method="post" class="row g-3 needs-validation" novalidate>
                                        <div class="col-12">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                            <div class="invalid-feedback">Please enter a valid Email address!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" name="motdepasse" required>
                                            <div class="invalid-feedback">Please enter a valid password!</div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary w-100" name="envoyer" value="Login"><br>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="ins.php">Create an account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


<?php



?>