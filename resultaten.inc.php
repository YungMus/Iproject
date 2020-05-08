<?php
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    if (isset($_POST['search'])){
        $search = htmlspecialchars(trim($_POST['search']));
        print_r($_POST);
    }
}
?>