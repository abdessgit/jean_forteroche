<?php

class UserDAO extends DAO
{
    public function register()
    {

        if (isset($_POST["pseudo"], $_POST["password"])) {

            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $sql = 'SELECT count(*) password FROM user WHERE pseudo = ?';
            $data = $this->createQuery($sql, [$_POST['pseudo']]);
            if (!empty($_POST["pseudo"]) && !empty($_POST["password"])) {
                $nbuser = $data->fetchColumn();
                if ($nbuser == 0) {
                    $sql = 'INSERT INTO user (pseudo, password, createdAt, role_id) VALUES (?, ?, NOW(), ?)';
                    $this->createQuery($sql, [$_POST['pseudo'], password_hash($_POST['password'], PASSWORD_BCRYPT), 1]);

                    $_SESSION['erreur_inscription'] = "votre compte a bien été ajouté";
                } else {
                    $_SESSION['erreur_inscription'] = "le pseudo existe déjà";
                }
            } else {
                $_SESSION['erreur_inscription'] = "tous les champs doivent être remplies";
            }
        }
    }
    public function login()
    {

        if (isset($_POST['submit'])) {
            if (isset($_POST["pseudo"], $_POST["password"]) and !empty($_POST["pseudo"]) and !empty($_POST["password"])) {
                $pseudo = $_POST['pseudo'];
                $password = $_POST['password'];

                $sql = 'SELECT id, pseudo, role_id, password FROM user WHERE pseudo = ?';

                $data = $this->createQuery($sql, [$_POST['pseudo']]);
                $result = $data->fetch();
                /*if (isset($result['password']) &&  password_verify($_POST['password'], $result['password'])) {
                    $_SESSION['user'] = $result['pseudo'];
                    $_SESSION['role_id'] = $result['role_id'];*/
                    echo "<script type='text/javascript'>window.location.href = '../public/index.php?route=administration';</script>";
                } else {
                    $_SESSION['erreur_connexion'] = "pseudo ou mot de passe est incorrect.";
                }
            } else {
                $_SESSION['erreur_connexion'] = "tous les champs doivent être completés";
            }
        }
    /*}*/
}
