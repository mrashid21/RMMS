<?php

// // This array will represent the information about the research..
// $resaerch = array(
// 	'name' => "",
// 	'status' => "",
// 	'completionPercentage' => 0,
// 	'contributers' => 0
// );

// // This array will be a collection of researches (array of arrays). Key will be the name of the researcher OR an auto increment integer..
// $researches = array();


// // Loop through the array of arrays and store new research information --> This will be useful to retrive the information from the database and display to the page...
// foreach ($researches as $key => $value) {
// 	//echo $key;
// 	$researches[$key]['name'] = "Ayoob";
// 	$researches[$key]['status'] = "pending";
// 	$researches[$key]['completionPercentage'] = 80;
// 	$researches[$key]['contributers'] = 4;
// }

// var_dump($researches);


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
        if (filter_has_var(INPUT_POST, 'submit-add-research')){
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