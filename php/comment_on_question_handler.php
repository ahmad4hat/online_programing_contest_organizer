<?php include '../view/partials/helper.php'; ?>

<?php
require_once('../service/commentOnQuestionService.php');
$res = [
    "error" => null,
    "success" => null,
    "redirect" => null,
    "msg" => null
];



if (!$user) {
    $res["redirect"] = "login";

    echo json_encode($res);
    exit();
}



if (!isset($_POST['json'])) {
    $res["msg"] = "There was no data send here json";
    echo json_encode($res);

    exit();
}

$value = json_decode($_POST['json'], true);

if (!(isset($value["question_id"]) ||
    isset($value["comment"]) ||
    isset($value["username"]))) {

    $res["msg"] = "There some fields are missing";
    echo json_encode($res);
    exit();
}

if (
    empty(trim($value["question_id"])) ||
    empty(trim($value["comment"])) ||
    empty(trim($value["username"]))
) {

    $res["msg"] = "some of the field was empty";
    echo json_encode($res);
    exit();
}










if (strlen($value['comment']) < 5) {
    $res["msg"] = "comment must be greater than 5 character long ";
    echo json_encode($res);
    exit();
}


$status = CreateQuestionComments($value);

if ($status) {
    $res['success'] = true;
    echo json_encode($res);
} else {
    $res['success'] = false;
    $res['msg'] = "Internal problem with the database";
    echo json_encode($res);
}
