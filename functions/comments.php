<?php

    function getComments($id) {
<<<<<<< HEAD
        session_start();
        include "/homes/hde-vos/Documents/camagru/config/database.php";
=======
        include "/homes/apappas/Applications/MAMP/apache2/htdocs/teamCamagru/config/database.php";
>>>>>>> 85b68b9b17155670c6ff8209d238634d6128e0a4
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `user`.`username`, `comment`.`text`, `comment`.`id` FROM `comment` INNER JOIN `user` ON `user`.`id` = `comment`.`userid` WHERE `imageid` = ?;");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $string = "";

        foreach ($result as $comment) {
            if ($_SESSION['username'] == $comment['username']) {
                $string = $string."<br><form action='functions/deleteComments.php' method='post'><button type='submit'>Delete</button><input name='id' type='hidden' value=".$comment['id']."></input></form><a href='user.php?name=".$comment['username']."'><strong>".$comment['username']."</strong></a>: ".$comment['text'];
            } else {
                $string = $string."<br><a href='user.php?name=".$comment['username']."'><strong>".$comment['username']."</strong></a>: ".$comment['text'];
            }
        }
        return ($string);
    }

    function deleteComment($id) {
        session_start();

        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $stmt = $dbh->prepare("DELETE FROM `comment` WHERE (`id` = ?);");
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo "ERROR  DB: \n" . $e->getMessage() . "\nAborting process\n";
        }
        
        if ($_GET['username'])
            header("Location: ../user.php?name=" . $_GET['username']);
        header("Location: ../gallery.php");
    }

?>