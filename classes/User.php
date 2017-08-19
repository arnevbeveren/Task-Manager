<?php

spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

class User
{
    private $m_sFirstName;
    private $m_sLastName;
    private $m_sEmail;
    private $m_sPassWord;
    private $m_iUserId;


    public function getFirstName()
    {
        return $this->m_sFirstName;
    }


    public function setFirstName($m_sFirstName)
    {
        if (!empty($m_sFirstName)) {
            $this->m_sFirstName = $m_sFirstName;
        } else {
            throw new Exception("Fill in a name please");
        }
    }


    public function getLastName()
    {
        return $this->m_sLastName;
    }


    public function setLastName($m_sLastName)
    {
        if (!empty($m_sLastName)) {
            $this->m_sLastName = $m_sLastName;
        } else {
            throw new Exception("Fill in a name please");
        }
    }


    public function getEmail()
    {
        return $this->m_sEmail;
    }


    public function setEmail($m_sEmail)
    {
        if (!empty($m_sEmail)) {
            $this->m_sEmail = $m_sEmail;
        } else {
            throw new Exception("Use a valid email please");
        }
    }

    public function getUserId()
    {
        return $this->m_iUserId;
    }

    public function setUserId($m_iUserId)
    {
            $this->m_iUserId = $m_iUserId;
    }


    public function getPassWord()
    {
        return $this->m_sPassWord;
    }


    public function setPassWord($m_sPassWord)
    {
        if (!empty($m_sPassWord) && strlen($m_sPassWord) > 6) {
            $this->m_sPassWord = $m_sPassWord;
        } else {
            throw new Exception("Your password must contain at least 6 characters");
        }
    }


    public function EmailIsAvailable()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM users WHERE email = :email');
        $statement->bindValue(':email', $this->m_sEmail, $conn::PARAM_STR);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function Save()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, userid)
VALUES (:firstname, :lastname, :email, :password, :userid)");
        $statement->bindValue(":firstname", $this->getFirstName());
        $statement->bindValue(":lastname", $this->getLastName());
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindValue(":userid", $this->getUserId());
        //paswoord hier pas hashen
        //Bcrypt password
        $options = [
            'cost' => 12,
        ];

        $password = password_hash($this->getPassWord(), PASSWORD_DEFAULT, $options);
        $statement->bindValue(":password", $password);
        //$statement->bindValue(":picture", $this->getMSPicture());

        if (!$statement->execute()) {
            throw new Exception("Your registration has failed, please try again.");
        } else {
            $conn2 = Db::getInstance();
            $statement2 = $conn2->prepare("select id from users where firstname = :firstname");
            $statement2->bindValue(":firstname", $this->getFirstName());
            $statement2->execute();
            $result = $statement2->fetch();
            $this->createSession($result['id']);

            header('Location: index.php');
        }
    }

    public function canLogin()
    {
        if (!empty($this->m_sEmail) && !empty($this->m_sPassWord)) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $statement->bindValue(":email", $this->m_sEmail, $conn::PARAM_STR);
            $statement->execute();
            if ($statement->rowCount() > 0) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $password = $this->m_sPassWord;
                $hash = $result['password'];
                if (password_verify($password, $hash)) {
                    $this->createSession($result['id']);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    private function createSession($id)
    {
        session_start();
        $_SESSION["user_id"] = $id;
    }

    // Get user to show on deadlines
    public function getUser(){


        $conn = Db::getInstance();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(":id", $_SESSION["user_id"]);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;


    }


}