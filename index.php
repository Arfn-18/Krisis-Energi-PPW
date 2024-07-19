<?php

if (isset($_GET['page']) && $_GET['page'] == 'Negara') {
    $page = 'negara.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'SumberEnergi') {
    $page = 'sumber_energi.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'KrisisEnergi') {
    $page = 'krisis_.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'ViewKeputusan') {
    $page = 'view_keputusan.php';
    include 'main.php';
} else {
    $page = 'view_keputusan.php';
    include 'main.php';
}
