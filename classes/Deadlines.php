<?php

spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

class Deadlines
{
    private $m_sDeadline;
    private $m_dDuration;
    private $m_sList;
    private $m_dExpiredate;
    private $m_iId;
    private $m_iUserId;
    private $m_sFirstName;
    private $m_sLastName;


    // GETTERS

    public function getDeadline()
    {
        return $this->m_sDeadline;
    }

    public function getDuration()
    {
        return $this->m_dDuration;
    }

    public function getList()
    {
        return $this->m_sList;
    }

    public function getExpiredate()
    {
        return $this->m_dExpiredate;
    }

    public function getId()
    {
        return $this->m_iId;
    }

    public function getUserId()
    {
        return $this->m_iUserId;
    }

    public function getFirstName()
    {
        return $this->m_sFirstName;
    }

    public function getLastName()
    {
        return $this->m_sLastName;
    }




    // SETTERS


    public function setDeadline($m_sDeadline)
    {
        $this->m_sDeadline = $m_sDeadline;
    }

    public function setDuration($m_dDuration)
    {
        $this->m_dDuration = $m_dDuration;
    }

    public function setList($m_sList)
    {
        $this->m_sList = $m_sList;
    }

    public function setExpiredate($m_dExpiredate)
    {
        $this->m_dExpiredate = $m_dExpiredate;
    }

    public function setId($m_iId)
    {
        $this->m_iId = $m_iId;
    }

    public function setUserId($m_iUserId)
    {
        $this->m_iUserId = $m_iUserId;
    }

    public function setFirstName($m_sFirstName)
    {
        $this->m_sFirstName = $m_sFirstName;
    }

    public function setLastName($m_sLastName)
    {
        $this->m_sLastName = $m_sLastName;
    }


    public function getDeadlines()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select deadlines.*, users.firstname, users.lastname, deadlines.id as deadline_id from deadlines inner join users on deadlines.userid = users.id order by expiredate asc");
        $statement->execute();

        $rResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }

    public function getDeadlineList()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select deadlines.*, users.firstname, users.lastname, deadlines.id as deadline_id from deadlines inner join users on deadlines.userid = users.id WHERE list = :list  order by expiredate ASC");
                                     ("select list from deadlines");
        $statement->bindValue(':list', $this->m_sList, PDO::PARAM_INT);
        $statement->execute();

        $rResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }





    public function AddDeadline()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into deadlines(deadline, duration, list, expiredate, id, userid)
                                      values (:deadline, :duration, :list, :expiredate, :id, :userid)");
        $statement->bindValue(":deadline", $this->m_sDeadline, PDO::PARAM_INT);
        $statement->bindValue(":duration", $this->m_dDuration, PDO::PARAM_INT);
        $statement->bindValue(":list", $this->m_sList, PDO::PARAM_INT);
        $statement->bindValue(":expiredate", $this->m_dExpiredate, PDO::PARAM_INT);
        $statement->bindValue(":id", $this->m_iId, PDO::PARAM_INT);
        $statement->bindValue(":userid", $this->m_iUserId, PDO::PARAM_INT);


        if ($statement->execute()) {
            header('Location: index.php');
        }

    }

    public function removeDeadline() {


        $conn = Db::getInstance();
        $statement = $conn->prepare("DELETE FROM deadlines WHERE id = :id");
        $statement->bindValue(':id', $this->m_iId, PDO::PARAM_INT);
        $statement->execute();


    }




}




