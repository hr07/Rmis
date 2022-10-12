<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die(trigger_error("You have made an invalid request"));
}

// if ($_SERVER["HTTP_X_REQUESTED_WITH"] !== "XMLHttpRequest") {
//     die("Invalid request");
// }
define("PATHNAME", true);
require_once "../../Config/Core.php";

$validator = new Validator;

$form = Functions::decrypt(Input::grab("form"));

$message = array(
    "message" => null,
    "flag" => 0,
);

switch ($form) {
    case "PropertyRegPersonalInfoForm":
        $FormData = array(
            "firstname" => Sanitize::String(Input::grab("firstname")),
            "lastname" => Sanitize::String(Input::grab("lastname")),
            "gender" => Sanitize::String(Input::grab("gender")),
            "national-id" => Sanitize::String(Input::grab("national-id")),
            "phone-number" => Sanitize::String(Input::grab("phone-number")),
            "email" => Sanitize::String(Input::grab("email")),
            "address" => Sanitize::String(Input::grab("address")),
        );
        $successMessage = "You have successfully completed the first step";
        break;
}

$validator->SetFormData($FormData);

$validator->Execute();

if (!$validator->ConfirmStatus()) {
    $message = array("message" => $validator->DisplayError(), "flag" => 0);
} else {
    $message = array("message" => $successMessage, "flag" => 1);
}

echo json_encode($message);