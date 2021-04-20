 <?php
    class ArticleDAO extends DAO
    {

        public function getArticles()
        {
            
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC LIMIT 0,1' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
       
        public function get_All_Article()
        {
            
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
        
        public function blog()
        {
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
        public function about()
        {
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
        
        public function getArticle($articleId)
        {
            $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id = ?';

            $query = $this->createQuery($sql,[$articleId]);
            $articleId = $query->fetchAll();
            
            return $articleId; 
        }

        public function add_article()
        {
            if (isset($_POST["title"], $_POST["content"], $_POST["author"]))
                {
                $title = htmlspecialchars($_POST['title']);
                $content = $_POST['content'];
                $author = htmlspecialchars($_POST['author']);
                
                if (!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["author"])) {
                    $sql = 'INSERT INTO article (title, content, author, createdAt) VALUES (?, ?, ?, NOW())';
                    $_SESSION['add_article_erreur'] = "<span>Votre article à bien été ajouté.</span>";
                    return $this->createQuery($sql,[$title, $content, $author]);
                    
                }else{
                    $_SESSION['add_article_erreur'] = "<span>tous les chemps doivent étre remplies.</span>";
                    return;
                }
            }
  
        } 
        
        public function edit_Article($POST, $articleId)
        {
           if(isset($_POST["title"], $_POST["content"], $_POST["author"]) && !empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["author"]))
           {
                $sql = 'UPDATE article SET title=:title, content=:content, author=:author WHERE id=:articleId';
                $this->createQuery($sql, [
                    'title' => $POST['title'],
                    'content' => $POST['content'],
                    'author' => $POST['author'],
                    'articleId' => $articleId
                ]);
            }else{
                echo $erreur = "tous les chemps doivent être completés";
            }
        
        }
        public function deletarticle($articleId)
        {

            $sql = 'DELETE FROM article WHERE id = ?';
            $this->createQuery($sql, [$articleId]);
        }
        public function administration()
        {
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
       
} 