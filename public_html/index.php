<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sinabons Team</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <main>
            <figure class='main__bg'>
                <img src="assets/imgs/back.png" alt="">
            </figure>
            <div class="main__chat">
                <?php
                    $db_host="localhost";
                    $db_name="nikisnb9_1"; 
                    $db_user="nikisnb9_1"; 
                    $db_pass="nikisnb9_1pass"; 
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); 
                    $mysqli->set_charset("utf8mb4"); 

                    $result = $mysqli->query("SELECT * FROM `table1` ORDER BY id DESC"); 
                    
                    $result2 = $mysqli->query("SELECT count(*) FROM table1");
                    $row2 = $result2->fetch_row();
                    $count = $row2[0];
                    
                    $i = $count;
                    
                    $result3 = $mysqli->query("SELECT time1 FROM table1 ORDER BY id DESC LIMIT 1");
                    $time1 = $result3->fetch_row();
                    $old = $time1[0];
                    $old1 = date("d.m.Y",strtotime($old));
                    
                    while($row = $result->fetch_assoc())
                    {
                        $date = $row[time1];
                        $date1 = date("d.m.Y",strtotime($date)); 
                        
                        if ($old1 != $date1) {
                            echo "<p class='main__date'>".date("d.m",strtotime($old1))."</p>";
                            $old1 = $date1;
                        } 
                        
                        echo "<div class='main__message'><p>".$row["text"]."</p> <span>".date("H:i",strtotime($date))."</span></div>";
                        
                        if ($i == 1) {
                            echo "<p class='main__date'>".date("d.m",strtotime($date))."</p>";
                        } 
                        
                        $i = $i - 1;
                    }
                ?>  

            </div>
            <form method="POST" action="send.php" class='main__form'>
                <div class="main__input-group">
                    <input class="main__input" name="text" type="text" placeholder="Написать сообщение..." required  autocomplete="off"/>
                    <button class="button__submit" type="submit">
                        <img src="assets/imgs/arrow.svg" alt="sumbit">
                    </button>
                </div>
            </form>      
            <?
                echo "<p class='main__count'>Количество записей: ".$count."</p>";
                exit();
            ?>
            
        </main>  
    </body>
</html