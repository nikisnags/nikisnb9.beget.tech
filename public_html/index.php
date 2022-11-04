<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sinabons Team</title>
    </head>
    <body>
        <form method="POST" action="send.php">
            <input name="text" type="text" placeholder="Текст..." required/>
            <input  type="submit" value="Отправить"/>
        </form>
        
        <?php
            $db_host='localhost';
            $db_name='nikisnb9_1'; 
            $db_user='nikisnb9_1'; 
            $db_pass='nikisnb9_1pass'; 
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); 
            $mysqli->set_charset("utf8mb4"); 

            $result = $mysqli->query('SELECT * FROM `table1` ORDER BY id DESC'); 
            
            $result2 = $mysqli->query('SELECT count(*) FROM table1');
            $row2 = $result2->fetch_row();
            $count = $row2[0];
            
            echo "Количество записей: ".$count.".";
            $i = $count;
            
            while($row = $result->fetch_assoc())
            {
                $date = $row[time1];
                
                echo '<p>'.$i.') '.date('d.m-H:i',strtotime($date)).' '.$row['text'].'</p>';
                $i = $i - 1 ;
            }
            exit();
        ?>
    </body>
</html