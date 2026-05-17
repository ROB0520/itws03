<?php

$config = require basePath('config/db.php');

$db = new Database($config);



loadView('listings/show');
