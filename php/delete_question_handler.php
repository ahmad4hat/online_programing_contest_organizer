<?php include '../view/partials/helper.php'; ?>

<?php
require_once('../service/questionService.php');
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


if (!isset($value['delete'])) {
    $res["msg"] = "There was no data send here value";
    echo json_encode($res);

    exit();
}

if (
    empty(trim($value["delete"]))
) {
    $res["msg"] = "value is empty";
    echo json_encode($res);
    exit();
}




$status = deleteQuestionById($value['delete']);

if ($status) {
    $res['success'] = true;
    echo json_encode($res);
} else {
    $res['success'] = false;
    $res['msg'] = "Internal problem with the database";
    echo json_encode($res);
}
