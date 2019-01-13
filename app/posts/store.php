<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_FILES['image'])) {
  $image = $_FILES['image'];
  $description = trim(filter_var($_POST['imageDescription'], FILTER_SANITIZE_STRING)) ?: 'No Description';
}

// In this file we store/insert new posts in the database.

redirect('/');
