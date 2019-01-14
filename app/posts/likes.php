<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['like'])) {
  $likes = $_POST['like']+1;

  

}


if (isset($_POST['dislike'])) {
  $dislikes = $_POST['dislike']-1;
}

redirect('/post.php')

 ?>
