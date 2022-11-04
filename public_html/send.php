<?php
    if (isset($_POST['text'])){
                
        $db_host = "localhost"; 
        $db_user = "nikisnb9_1"; 
        $db_password = "nikisnb9_1pass"; 
        $db_base = 'nikisnb9_1';
        $db_table = "table1";

        try {
            $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
            $db->exec("set names utf8");
                
            //$text = $_POST['text'];
            $text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
                
            $data = array( 'text' => $text );
            $query = $db->prepare("INSERT INTO $db_table (text) values (:text)");
            $query->execute($data);
            $result = true;
        } catch (PDOException $e) {
            print "Ошибка!: " . $e->getMessage() . "<br/>";
        }
    }
    header('Location: http://nikisnb9.beget.tech');
    exit();
?>