<?php
    class Account{


        private $con;
        private $errorArray = array();

        public function __construct($con){
            $this->con = $con;

        }

        public function register($fn,$ln,$un,$em,$em2,$pw,$pw2){
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateUserName($un);
            $this->validateEmails($em,$em2);
            $this->validatePasswords($pw,$pw2);
        }

        private function validateFirstName($fn){
            if(strlen($fn)<2 || strlen($fn)>25){
                array_push($this->errorArray, Constants::$firstNameCharacters);
            }
        }
        private function validateLastName($ln){
            if(strlen($ln)<2 || strlen($ln)>25){
                array_push($this->errorArray, Constants::$lastNameCharacters);
            }
        }

        private function validateUsername($un){
            if(strlen($un)<2 || strlen($un)>25){
                array_push($this->errorArray, Constants::$userNameCharacters);
            }

            $query = $this->con->prepare("SELECT * FROM users WHERE username = :un"); // checks if there is an exisitng user with the same username
            $query -> bindValue(":un",$un);
            $query -> execute();

            if($query->rowCount() != 0){
                array_push($this->errorArray, Constants::$userNameTaken);
            }
        }

        private function validateEmails($em, $em2){
            if($em != $em2){
                array_push($this->errorArray, Constants::$emailsDontMatch);
            }
            if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailCharacters);
            }

            $query=$this->con->prepare("SELECT * FROM users WHERE email = :em");
            $query->bindValue(":em",$em);
            $query->execute();

        }

        private function validatePasswords($pw, $pw2){
            if($pw != $pw2){
                array_push($this->errorArray, Constants::$validatePasswords);
            }

            if(strlen($pw)<5 || strlen($pw)>25){
                array_push($this->errorArray, Constants::$passwordCharacters);
            }

        }

        public function getError($error){
            if(in_array($error, $this->errorArray)){
                return "<span class = 'errorMessage'>$error</span>";
            }
        }

        

    }

?>