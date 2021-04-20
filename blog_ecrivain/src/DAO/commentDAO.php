<?php

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$articleId]);
    }
    public function get_comment()
    {

        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id AND flag = 1 ORDER BY article_id DESC ';
        $query = $this->createQuery($sql);
        $comments = $query->fetchAll();

        return $comments;
    }
    public function add_comment()
    {
        if (isset($_POST["pseudo"], $_POST["content"])) {

            $pseudo = $_POST['pseudo'];
            $content = htmlspecialchars($_POST['content']);
            $article_id = htmlspecialchars($_POST['article_id']);
            if (!empty($_POST["pseudo"]) and !empty($_POST["content"]) and !empty($_POST["article_id"])) {
                $sql = 'INSERT INTO comment (pseudo, content, createdAt, flag, article_id) VALUES (?,?, NOW(),0,?)';
                $_SESSION['add_comment'] = "<span>Votre commentaire à bien été posté.</span>";
                return $this->createQuery($sql, array($pseudo, $content, $article_id));
            } else {
                $_SESSION['add_comment'] = "<span>tous les chemps doivent étre remplies.</span>";
            }
        }
    }
    public function comment_for_flaged()
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag, article_id FROM comment WHERE flag = 0';
        $query = $this->createQuery($sql);
        $commentflag = $query->fetchAll();

        return $commentflag;
    }
    public function flagcomment()
    {

        $sql = 'UPDATE comment SET flag = 1 WHERE id= ?';
        $this->createQuery($sql, [intval($_GET['id'])]);
    }
    public function signalcomment()
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id ORDER BY article_id DESC ';
        $query = $this->createQuery($sql);
        $comments = $query->fetchAll();
        return $comments;
    }
    public function deletcomment($id)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$id]);
    }
}
