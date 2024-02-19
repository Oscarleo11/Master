<?php

session_start();

require("../../Config/commandes.php");

if (!isset($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
}
if (empty($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
}

$Produits = afficher();

foreach ($_SESSION['xhTohTuzPbbsTtr71'] as $i) {
    $nom = $i->pseudo;
    $email = $i->email;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tout les Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src='main.js'></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        img {
            width: 150px;
            height: 150px;
        }
    </style>


</head>

<body>

    <header>
        <?php include('header.PHP') ?>
    </header>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($Produits as $Produit) : ?>
                            <tr>
                                <th scope="row">
                                    <?= $Produit->id ?>
                                </th>
                                <td>
                                    <img src="<?= $Produit->image ?>" class="img-fluid" alt="Image du produit">
                                </td>
                                <td>
                                    <?= $Produit->nom ?>
                                </td>
                                <td style="font-weight: bold; color: green; ">
                                    <?= $Produit->prix ?>$
                                </td>
                                <td>
                                    <?= substr($Produit->description, 0, 20) ?>...
                                </td>
                                <td>
                                    <a href="editer.php?ptd=<?= $Produit->id ?>"><i class="fa fa-pencil" style="font-size: 20px;"></i></a>
                                </td>
                                <td>
                                    <button type="button" onclick="confirmDelete(<?= $Produit->id ?>)" >
                                        <i class="fa fa-trash-can" style="font-size: 20px; color:red;"></i>
                                    </button>

                                </td>
                            </tr>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <footer>
        <?php include('../../footer.php') ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<script>
    function confirmDelete(productId) {
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
        if (confirmation) {
            // Si l'utilisateur confirme, redirige vers le script de suppression avec l'ID du produit
            window.location.href = "supprimer_produit.php?id=" + productId;
        }
    }
</script>