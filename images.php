<?php

    $sql = 'SELECT * FROM image WHERE id = 1 LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll();?>

$image_array = mysqli_fetch_array()