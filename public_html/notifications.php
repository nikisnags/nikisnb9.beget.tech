<?php
    $db_host='localhost';
    $db_name='nikisnb9_1'; 
    $db_user='nikisnb9_1'; 
    $db_pass='nikisnb9_1pass';
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $mysqli->set_charset("utf8mb4");
    
    $result2 = $mysqli->query('SELECT count(*) FROM table1');
    $row2 = $result2->fetch_row();
    $count = $row2[0];
    
    $to = "rodionova@uniweb.ru";
    $subject = " Cчётчик строк БД";
    
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf8';
    $headers[] = 'From: Sinabons Team <sinabons@nikisnb9.beget.tech>';
    
    $message = '<html><head><style>
                    .ggg {font-size: 50px;}
                </style></head>
            <body><div class="ggg">'.$count.'</div></body></html>';
    
    mail($to, $subject, $message, implode("\r\n", $headers));
    exit();
?>