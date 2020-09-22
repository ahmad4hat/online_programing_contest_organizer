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

if ($user) {
    if ($user['user_type'] !== 'teacher') {
        $res["msg"] = "you cant create question unless you are a teacher";
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

if (!(isset($value["problemStatement"]) ||
    isset($value["difficulty"]) ||
    isset($value["lastSubmissionDate"])
    || isset($value["totalMark"]) ||
    isset($value["expectedOutput"])
    ||
    isset($value["supported_language"]) ||
    isset($value["hints"]) ||
    isset($value["instructions"]))) {

    $res["msg"] = "There was no data send here ";
    echo json_encode($res);
    exit();
}

if (
    empty(trim($value["problemStatement"])) ||
    empty(trim($value["difficulty"])) ||
    empty(trim($value["totalMark"])) ||
    empty(trim($value["expectedOutput"])) ||
    empty(trim($value["lastSubmissionDate"])) ||
    empty(trim($value["supported_language"])) ||
    empty(trim($value["hints"])) ||
    empty(trim($value["instructions"]))
) {

    $res["msg"] = "some of the field was empty";
    echo json_encode($res);
    exit();
}


$problemStatement = $value["problemStatement"];
$difficulty = $value["difficulty"];
$totalMark = $value["totalMark"];
$expectedOutput = $value["expectedOutput"];
$lastSubmissionDate = $value["lastSubmissionDate"];
$supported_language = $value["supported_language"];
$hints = $value["hints"];
$instructions = $value["instructions"];

if (strtotime($lastSubmissionDate) < time()) {
    $res["msg"] = "Last submission date must be after today";
    echo json_encode($res);
    exit();
}

if (strlen($problemStatement) < 20) {
    $res["msg"] = "Problem Statement at least 20 character long ";
    echo json_encode($res);
    exit();
}
if (strlen($expectedOutput) < 5) {
    $res["msg"] = "expectedOutput at least 5 character long ";
    echo json_encode($res);
    exit();
}
if (strlen($supported_language) < 1) {
    $res["msg"] = "supported_language at least 1 character long ";
    echo json_encode($res);
    exit();
}
if (strlen($hints) < 5) {
    $res["msg"] = "hints at least 1 character long ";
    echo json_encode($res);
    exit();
}
if (strlen($instructions) < 5) {
    $res["msg"] = "instructions at least 5 character long ";
    echo json_encode($res);
    exit();
}





if (number_format($totalMark) < 0  || number_format($totalMark) > 500) {
    $res["msg"] = "Total must be between 0 and 500 ";
    echo json_encode($res);
    exit();
}


$value["creator"] = $user["username"];

$status = create($value);

if ($status) {
    $res['success'] = true;
    echo json_encode($res);
} else {
    $res['success'] = false;
    $res['msg'] = "Internal problem with the database";
    echo json_encode($res);
}
