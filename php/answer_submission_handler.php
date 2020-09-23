<?php include '../view/partials/helper.php'; ?>

<?php
require_once('../service/answerService.php');
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
    if ($user['user_type'] !== 'participant') {
        $res["msg"] = "you cant answer question unless you are a participant";
        echo json_encode($res);

        exit();
    }
}

if (!isset($_POST['json'])) {
    $res["msg"] = "There was no data send here ";
    echo json_encode($res);

    exit();
}

$value = json_decode($_POST['json'], true);

if (!(isset($value["submittedAnswer"]))) {

    $res["msg"] = "There was no data send here ";
    echo json_encode($res);
    exit();
}

if (
    empty(trim($value["submittedAnswer"]))

) {

    $res["msg"] = "some of the field was empty";
    echo json_encode($res);
    exit();
}

if (strlen($value["submittedAnswer"]) < 10) {
    $res["msg"] = "submitted answer should be at  least 10 character long ";
    echo json_encode($res);
    exit();
}


// $value['submissionDate'] = time();




$status = create($value);

if ($status) {
    $res['success'] = true;
    echo json_encode($res);
} else {
    $res['success'] = false;
    $res['msg'] = "Internal problem with the database";
    echo json_encode($res);
    
}
