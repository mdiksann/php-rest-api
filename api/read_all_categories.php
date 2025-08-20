<?php

header("Access-Control-Allow-Origin: *");   
header("Content-Type: application/json");

include_once ('../core/initialize.php');

//initialize post
$post = new Category($db);
$result = $post->read();
$num = $result->rowCount();

if ($num > 0) {
    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $id,
            'name' => $name,
            'created_at' => $created_at
        );
        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
} else {
    echo json_encode(
        array('message' => 'No Categories Found')
    );
}
?>