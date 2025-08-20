<?php

class Category {
    private $conn;
    private $table = 'categories';

    //category properties
    public $id;
    public $name;
    public $created_at;

    //db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    //get categories
    public function read() {
        $query = 'SELECT *
                  FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}