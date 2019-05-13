<?php


class Research
{
	protected $name;
	protected $status;
	protected $completionPercentage;
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
        return $this->staus;
    }

    /**
     * @param mixed $staus
     *
     * @return self
     */
    public function setStatus($staus)
    {
        $this->staus = $staus;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompletionPercentage()
    {
        return $this->completionPercentage;
    }

    /**
     * @param mixed $completionPercentage
     *
     * @return self
     */
    public function setCompletionPercentage($completionPercentage)
    {
        $this->completionPercentage = $completionPercentage;

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
        	$this->setCompletionPercentage($_POST['research-completionPercentage']);
        	return true;
        }
        return false;
    }
}
?>