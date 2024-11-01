<?php

require_once __DIR__ . '/autoload.php';

use app\exceptions\DataException;
use app\exceptions\ValidationExceptions;

use app\business\Add;
use app\business\Delete;
use app\business\Get;
use app\business\Update;

use app\data\Repository;
use app\validators\Validator;


$repository = new Repository();
$validator = new Validator();  

try { 
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $get = new Get($repository);
            echo json_encode($get->get());
            break;
        case 'POST':
            $post = new Add($repository, $validator);
            $body = json_decode(file_get_contents("php://input"), true);
            $add->add($body);
            break;
        case 'PUT':
            $put = new Update($repository, $validator);
            $body = json_decode(file_get_contents("php://input"), true);
            $put->update($body);
            break;
        case 'DELETE':
            $id = $_GET['id'];
            $delete = new Delete($repository);
            $delete->delete($id);
            break;
        default:
            http_response_code(405);
    }
}catch(DataException $e) {
    http_response_code(404);
    echo json_encode(['error' => $e->getMessage()]);
}catch(ValidationExceptions $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}catch(\Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}

