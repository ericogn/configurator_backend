<?php


use Firebase\JWT\Key;
use Firebase\JWT\JWT;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../../database/jwthandler.php';

class Auth extends JwtHandler
{
    protected $db;
    protected $headers;
    protected $token;

    public function __construct($db, $headers)
    {
        parent::__construct();
        $this->db = $db;
        $this->headers = $headers;
    }

    public function isValid()
    {

        if (array_key_exists('Authorization', $this->headers) && preg_match('/Bearer\s(\S+)/', $this->headers['Authorization'], $matches)) {
            $data = $this->jwtDecodeData($matches[1]);
            
            if (
                isset($data['data']->data->user_email) && $user = $this->fetchUser($data['data']->data->user_email)
            ) :
                return [
                    "success" => 1,
                    "firstname" => $user['firstname'],
                    "lastname" => $user['lastname'],
                    "email" => $user['email'],
                    "company" => $user['company'],
                    "lastAccessedProjectID" => $user['lastAccessedProjectID'],
                    "multiplier" => $user['multiplier'],
                    "token_iss" => $data['data']->iss,
                    "token_aud" => $data['data']->aud,
                    "token_iat" => $data['data']->iat,
                    "token_exp" => $data['data']->exp
                ];
            else :
                
                return [
                    "success" => isset($data['data']->user_email),
                    "message" => $data
                    
                ];
            endif;
        } else {
            return [
                "success" => 0,
                "message" => "Token not found in request",
            ];
        }
    }

    protected function fetchUser($user_email)
    {
        try {
            $fetch_user_by_id = "SELECT * FROM `user` WHERE email =:email";
            $query_stmt = $this->db->prepare($fetch_user_by_id);
            $query_stmt->bindValue(':email', $user_email, PDO::PARAM_INT);
            $query_stmt->execute();

            if ($query_stmt->rowCount()) :
                return $query_stmt->fetch(PDO::FETCH_ASSOC);
            else :
                return false;
            endif;
        } catch (PDOException $e) {
            return null;
        }
    }
}