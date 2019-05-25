<?php

class Task
{

    protected $name;
    protected $completion;
    protected $start_date;
    protected $due_date;
    protected $done;
    protected $researchId;



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompletion()
    {
        return $this->completion;
    }

    /**
     * @param mixed $completion
     *
     * @return self
     */
    public function setCompletion($completion)
    {
        $this->completion = $completion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $due_date
     *
     * @return self
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     *
     * @return self
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * @param mixed $done
     *
     * @return self
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    public function getResearchId()
    {
        return $this->researchId;
    }


    public function setResearchId($researchId)
    {
        $this->researchId = $researchId;

        return $this;
    }

    public function setTaskInfo(){
        if (filter_has_var(INPUT_POST, 'task-name')){
            $this->setName($_POST['task-name']);
            $this->setCompletion($_POST['task-completion']);
            $this->setStartDate($_POST['task-start_date']);
            $this->setDueDate($_POST['task-due_date']);
            $this->setDone((int)$_POST['task-done']);
            $this->setResearchId($_GET['id']);
            return true;
        }
        return false;
    }

}

