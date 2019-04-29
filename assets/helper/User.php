<?php  

class User
{

	protected $firstName;
	protected $lastName;
	protected $userName;
	protected $email;
	protected $password;
	protected $confirmPassword;


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     *
     * @return self
     */
    protected function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     *
     * @return self
     */
    protected function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     *
     * @return self
     */
    protected function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    protected function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    protected function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * @param mixed $confirmPassword
     *
     * @return self
     */
    protected function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    public function setUserInfoSignup($firstName, $lastName, $userName, $email, $password, $confirmPassword){
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setUserName($userName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setConfirmPassword($confirmPassword);
    }

    public function setUserInfoLogin($email, $password){
        $this->setEmail($email);
        $this->setPassword($password);

    }
    
    function getUserInfoSignup($user){
        if (filter_has_var(INPUT_POST, 'submit-signup')){
            $user->setUserInfoSignup(
                                $_POST['firstName'],
                                $_POST['lastName'],
                                $_POST['userName'],
                                $_POST['email'],
                                $_POST['password'],
                                $_POST['confirmPassword']
                            );
            return true;
        }
        return false;
    }

    function getUserInfoLogin($user){
        if(filter_has_var(INPUT_POST, 'submit-login')){
            $user->setUserInfoLogin(
                                $_POST['login-email'],
                                $_POST['login-password']
                            );
            return true;
        }
        return false;
    }

    function clearUserFields(){
        $this->setFirstName(null);
        $this->setLastName(null);
        $this->setUserName(null);
        $this->setEmail(null);
        $this->setPassword(null);
        $this->setConfirmPassword(null);
    }




}

?>