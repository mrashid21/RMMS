<?php  

class User
{

	protected $firstName;
	protected $lastName;
	protected $userName;
	protected $email;
	protected $password;
	protected $confirmPassword;
    protected $userType;


    public function getFirstName()
    {
        return $this->firstName;
    }

    protected function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    protected function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    protected function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    protected function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    protected function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    public function getUserType()
    {
        return $this->userType;
    }

    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    public function setUserInfoSignup($firstName, $lastName, $email, $password, $userType){
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setUserType($userType);

    }

    public function setUserInfoLogin($email, $password){
        $this->setEmail($email);
        $this->setPassword($password);

    }

    private function hashedPassword(){
        return password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    
    function getUserInfoSignup($user){
        if (filter_has_var(INPUT_POST, 'submit-signup')){
            $user->setUserInfoSignup(
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['email'],
                $this->hashedPassword(),
                $_POST['userType']
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
        $this->setEmail(null);
        $this->setPassword(null);
        $this->setConfirmPassword(null);
        $this->setUserType(null);
    }


}

?>