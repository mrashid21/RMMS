<?php


class Research
{
	protected $name;
	protected $status;
	protected $stage;
	protected $completion;
	protected $contributers;

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
    public function getStatus()
    {
    	return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
    	$this->status = $status;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getStage()
    {
    	return $this->stage;
    }

    /**
     * @param mixed $stage
     *
     * @return self
     */
    public function setStage($stage)
    {
    	$this->stage = $stage;

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
    public function getContributers()
    {
    	return $this->contributers;
    }

    /**
     * @param mixed $contributers
     *
     * @return self
     */
    public function setContributers($contributers)
    {
    	$this->contributers = $contributers;

    	return $this;
    }


    public function setResearchInfo(){
    	if (filter_has_var(INPUT_POST, 'research-name')){
    		$this->setName($_POST['research-name']);
    		$this->setStatus($_POST['research-status']);
    		$this->setContributers($_POST['research-contributers']);
    		$this->setCompletion($_POST['research-completionPercentage']);
    		// $this->setStage($_POST['research-stage']);
    		return true;
    	}
    	return false;
    }
}

?>