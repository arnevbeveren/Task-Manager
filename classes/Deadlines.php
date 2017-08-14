<?php

class Deadlines
{
    private $m_sDeadline;
    private $m_dDuration;
    private $m_sCourse;
    private $m_dExpiredate;
    private $m_iId;

    public function getDeadline()
    {
        return $this->m_sDeadline;
    }

    public function getDuration()
    {
        return $this->m_dDuration;
    }

    public function getCourse()
    {
        return $this->m_sCourse;
    }

    public function getExpiredate()
    {
        return $this->m_dExpiredate;
    }


    public function setDeadline($m_sDeadline)
    {
        $this->m_sDeadline = $m_sDeadline;
    }

    public function setDuration($m_dDuration)
    {
        $this->m_dDuration = $m_dDuration;
    }

    public function setCourse($m_sCourse)
    {
        $this->m_sCourse = $m_sCourse;
    }

    public function setExpiredate($m_dExpiredate)
    {
        $this->m_dExpiredate = $m_dExpiredate;
    }


    public function getDeadlines() {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select deadline, duration, course, expiredate from deadlines order by expiredate ASC");
        $statement->execute();

        $rResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }




}