<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require "../../database/database.php";
$db_connection = new Database();
$conn = $db_connection->getConnection();

function msg($success, $status, $message, $extra = [])
{
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra);
}

// DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));
$returnData = [];

if ($_SERVER["REQUEST_METHOD"] != "POST") :

    $returnData = msg(0, 401, 'You need to set request option to POST !');

elseif (
    !isset($data->firstname)
    || !isset($data->email)
    || !isset($data->password)

    || empty(trim($data->firstname))
    || empty(trim($data->email))
    || empty(trim($data->password))
) :

    $fields = ['fields' => ['firstname', 'email', 'password', 'company']];
    $returnData = msg(0, 422, 'Please Fill in all Required Fields!', $fields);

// IF THERE ARE NO EMPTY FIELDS THEN-
else :

    $firstname = trim($data->firstname);
    $lastname = trim($data->lastname);
    $email = trim($data->email);
    $password = trim($data->password);
    $company = trim($data->company);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $returnData = msg(0, 422, 'Invalid Email Address!');

    elseif (strlen($password) < 8) :
        $returnData = msg(0, 422, 'Your password must be at least 8 characters long!');

    elseif (strlen($firstname) < 1) :
        $returnData = msg(0, 422, 'Your name must be at least 1 characters long!');

    else :
        try {

            // $check_email = "SELECT `email` FROM `users` WHERE `email`=:email";
            // $check_email_stmt = $conn->prepare($check_email);
            // $check_email_stmt->bindValue(':email', $email);
            // $check_email_stmt->execute();

            // if ($check_email_stmt->rowCount()) :
            //     $returnData = msg(0, 422, 'This E-mail already in use!');

            // else :
                $insert_query = "INSERT IGNORE INTO `user`
                SET
                firstname=:firstname,
                lastname=:lastname,
                email=:email,
                password=:password,
                company=:company";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':firstname', htmlspecialchars(strip_tags($firstname)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':lastname', htmlspecialchars(strip_tags($lastname)), PDO::PARAM_STR);
                $insert_stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $insert_stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                $insert_stmt->bindValue(':company', $company, PDO::PARAM_STR);
                $insert_stmt->execute();

                $returnData = msg(1, 201, 'You have successfully registered.');

            //endif;
        } catch (PDOException $e) {
            $returnData = msg(0, 500, $e->getMessage());
        }
    endif;
endif;

echo json_encode($returnData);

?>