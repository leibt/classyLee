<?php

if(file_exists("./admin/lib/php/dbConnect.php")){
    include('./admin/lib/php/dbConnect.php');
    include('./admin/lib/php/autoload.php');
}
else if(file_exists ("./lib/php/dbConnect.php")){
    include('./lib/php/dbConnect.php');
    include('./lib/php/autoload.php');    
}

