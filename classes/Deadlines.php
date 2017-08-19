<?php

class Deadlines
{
    private $m_sDeadline;
    private $m_dDuration;
    private $m_sList;
    private $m_dExpiredate;
    private $m_iId;


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


    public function getDeadlines()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select deadline, duration, list, expiredate, id from deadlines order by expiredate ASC");
        $statement->execute();

        $rResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }

    public function getDeadlineList()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from deadlines WHERE list = :list");
                                     ("select list from deadlines");
        $statement->bindValue(':list', $this->m_sList, PDO::PARAM_INT);
        $statement->execute();

        $rResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }





    public function AddDeadline()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into deadlines(deadline, duration, list, expiredate, id)
                                      values (:deadline, :duration, :list, :expiredate, :id)");
        $statement->bindValue(":deadline", $this->m_sDeadline);
        $statement->bindValue(":duration", $this->m_dDuration);
        $statement->bindValue(":list", $this->m_sList);
        $statement->bindValue(":expiredate", $this->m_dExpiredate);
        $statement->bindValue(":id", $this->m_iId);
        if ($statement->execute()) {
            header('Location: index.php');
        }

    }

    public function removeDeadline() {


        $db = Db::getInstance();
        $statement = $db->prepare("DELETE FROM deadlines WHERE id = :id");
        $statement->bindValue(':id', $this->m_iId, PDO::PARAM_INT);
        $statement->execute();
    }




}




