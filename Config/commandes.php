<?php
//Inscription d'un utilisateur
function ajouterUser($nom, $email, $motdepasse)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO utilisateurs (nom, email, motdepasse) VALUES (?, ?, ?)");

        $req->execute(array($nom, $email, $motdepasse));

        return true;
    }
    $req->closeCursor();
}

// connexion de l'utilisateur
function getUsers($email, $motdepasse)
{
    if (require("connexion.php")) {

        $req = $access->prepare("SELECT id, nom, email FROM utilisateurs WHERE email = ? AND motdepasse = ?");

        $req->execute(array($email, $motdepasse));

        if ($req->rowCount() == 1) {

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            foreach ($data as $y) {
                $mail = $y->email;
                $mdp = $y->motdepasse;
            }

            if ($mail == $email and $mdp == $password) {
                return $data;
            } else {
                return false;
            }
        }
    }
    $req->closeCursor();
}



// connexion de l'administrateur
function getAdmin($email, $motdepasse)
{
    if (require("connexion.php")) {

        $req = $access->prepare("SELECT id, pseudo, email FROM adm WHERE email = ? AND motdepasse = ?");

        $req->execute(array($email, $motdepasse));

        if ($req->rowCount() == 1) {

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            foreach ($data as $i) {
                $mail = $i->email;
                $mdp = $i->motdepasse;
            }

            if ($mail == $email and $mdp == $password) {
                return $data;
            } else {
                return false;
            }
        }
    }
    $req->closeCursor();
}
// function getAdmin($email, $motdepasse)
// {
//     // Inclure le fichier de connexion
//     require("connexion.php");

//     try {
//         // Utiliser des requêtes préparées pour éviter les attaques par injection SQL
//         $req = $access->prepare("SELECT id, pseudo, email, motdepasse FROM adm WHERE email = :email");
//         $req->bindParam(':email', $email);
//         $req->execute();

//         // Vérifier le nombre de résultats
//         if ($req->rowCount() == 1) {

//             // Récupérer les données de l'administrateur
//             $data = $req->fetch(PDO::FETCH_OBJ);

//             // Vérifier le mot de passe
//             if (password_verify($motdepasse, $data->motdepasse)) {
//                 return $data; // Retourner les données de l'administrateur
//             } else {
//                 return false; // Mot de passe incorrect
//             }
//         } else {
//             return false; // Aucune correspondance trouvée
//         }
//     } catch (PDOException $e) {
//         // Gérer les erreurs de base de données de manière appropriée
//         error_log("Erreur de base de données: " . $e->getMessage());
//         return false;
//     } finally {
//         // Fermer le curseur de base de données
//         $req->closeCursor();
//     }
// }



function ajouterAdmin($pseudo, $email, $motdepasse)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO adm (pseudo, email, motdepasse) VALUES (?, ?, ?)");

        $req->execute(array($pseudo, $email, $motdepasse));

        return true;
    }
    $req->closeCursor();
}


// *le crud

//modifier les produits
function modifier($image, $nom, $prix, $desc, $id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

        $req->execute(array($image, $nom, $prix, $desc, $id));

        $req->closeCursor();
    }
}

function getProduit($id)
{
    if (require("connexion.php")) {

        $req = $access->prepare("SELECT * FROM produits WHERE id =?");

        $req->execute(array($id));

        if ($req->rowCount() == 1) {

            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } else {
            return false;
        }
    }
    $req->closeCursor();
}

// Ajouter à la base de donnée
function ajouter($image, $nom, $prix, $desc)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (:image, :nom, :prix, :desc)");

        $req->execute(
            array(
                'image' => $image,
                'nom' => $nom,
                'prix' => $prix,
                'desc' => $desc
            )
        );

        $req->closeCursor();
    };
}

// function ajouter($image, $nom, $prix, $desc)
// {
//     if (require("connexion.php")) {
//         // Si $image est un lien, utilisez directement le lien
//         if (filter_var($image, FILTER_VALIDATE_URL)) {
//             $image_relative = $image;
//         } else {
//             // Sinon, c'est un fichier téléchargé, stockez le chemin relatif
//             $uploadDir = 'admin/images/';
//             $uploadFile = $uploadDir . basename($image);

//             // Assurez-vous que $image contient le chemin correct après le téléchargement
//             if (move_uploaded_file($image, $uploadFile)) {
//                 $image_relative = $uploadFile;
//                 echo "Le fichier a été téléchargé avec succès.";
//             } else {
//                 echo "Erreur lors du déplacement du fichier téléchargé.";
//                 error_log("Erreur lors du déplacement du fichier téléchargé. Chemin du fichier : " . $uploadFile);
//                 exit();
//             }
//         }

//         $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (:image, :nom, :prix, :desc)");

//         $req->execute(
//             array(
//                 'image' => $image_relative,
//                 'nom' => $nom,
//                 'prix' => $prix,
//                 'desc' => $desc
//             )
//         );

//         $req->closeCursor();
//     }
// }




// Afficher
function afficher()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    $req->closeCursor();
}


// Supprimer
function supprimer($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("DELETE FROM produits WHERE id=?");

        $req->execute(array($id));

        // Ferme la connexion avec la base de données
        $access = null;
    }
}

function afficherDetailsProduit($id)
{
    if (require("connexion.php")) {

        try {
            $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
            $req->execute([$id]);

            if ($req->rowCount() == 1) {
                $produit = $req->fetch(PDO::FETCH_OBJ);
                return $produit;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
