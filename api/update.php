<?php

header("Access-Control-Allow-Origin: *");   
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

include_once ('../core/initialize.php');

//initialize post
$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

if ($post->update()) {
    echo json_encode(
        array('message' => 'Post Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Post Not Updated')
    );
}