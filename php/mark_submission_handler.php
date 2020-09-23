<?php include '../view/partials/helper.php'; ?>

<?php
require_once('../service/markService.php');
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

if ($user) {
    if ($user['user_type'] !== 'teacher') {
        $res["msg"] = "you cant create question unless you are a teacher";
        echo json_encode($res);

        exit();
    }
}

if (!isset($_POST['json'])) {
    $res["msg"] = "There was no data send here json";
    echo json_encode($res);

    exit();
}

$value = json_decode($_POST['json'], true);

if (!(isset($value["answer_id"]) ||
    isset($value["mark"]) ||
    isset($value["username_teacher"])
    || isset($value["username_participant"]))) {

    $res["msg"] = "There some fields are missing";
    echo json_encode($res);
    exit();
}

if (
    empty(trim($value["answer_id"])) ||
    empty(trim($value["username_teacher"])) ||
    empty(trim($value["username_participant"])) ||
    empty(trim($value["mark"]))
) {

    $res["msg"] = "some of the field was empty";
    echo json_encode($res);
    exit();
}










if (number_format($value["mark"]) < 0  || number_format($value["mark"]) > 500) {
    $res["msg"] = "Total must be between 0 and 500 ";
    echo json_encode($res);
    exit();
}


$status = createMark($value);

if ($status) {
    $res['success'] = true;
    echo json_encode($res);
} else {
    $res['success'] = false;
    $res['msg'] = "Internal problem with the database";
    echo json_encode($res);
}
