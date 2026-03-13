<?php
class ProductController {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function index() {
        Response::json($this->product->getCategory());
      // Response::json(["message" => "Student Created Successfully"], 201);
    }

    public function getCategory() {
        Response::json($this->product->getCategory());
      // Response::json(["message" => "Student Created Successfully"], 201);
    }
    public function getProducts(){
        Response::json($this->product->getProducts());
    }


    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data['name'], $data['email'], $data['class'])) {
            Response::json(["error" => "Invalid input"], 400);
        }

        $this->product->create($data);
        Response::json(["message" => "Student Created Successfully"], 201);
    }
}
 