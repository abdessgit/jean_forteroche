<?php

class ContactDAO extends DAO
{

    public function contact()
    {
        $sql = 'SELECT * FROM `contact` WHERE 1';
        $query = $this->createQuery($sql);
        $contacts = $query->fetchAll();

        return $contacts;
    }

    public function insercontact()
    {
        if (isset($_POST["name"], $_POST["email"], $_POST["message"])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            if (!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["message"])) {
                $sql = 'INSERT INTO contact (name, email, message, createdAt) VALUES (?, ?, ?, NOW())';
                $_SESSION['erreur_contact'] = "<span style=color:gree>Votre message à bien été envoyer.</span>";
                return $this->createQuery($sql, [$name, $email, $message]);
            } else {
                $_SESSION['erreur_contact'] = "<span>tous les chemps doivent être remplies.</span>";
            }
        }
    }
    public function deletmessage($contactid)
    {
        $sql = 'DELETE FROM contact WHERE id = ?';
        $this->createQuery($sql, [$contactid]);
    }
}
