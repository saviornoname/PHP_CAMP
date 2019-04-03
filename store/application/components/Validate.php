<?php

namespace application\components;

class Validate
{
    public $error = [];

    /**
     * @param $string
     * @param int $length
     * @param string $type
     * @return string
     */
    public function checkStringLength($string, $length = 8, $type = 'Password')
    {
        if (strlen($string) < $length) {
            return $type . ' must be length ' . $length . ' symbols';
        }
        return '';
    }

    /**
     * @param $stringOne
     * @param $stringTwo
     * @param string $type
     * @return string
     */
    public function checkMatchString ($stringOne, $stringTwo, $type = 'password')
    {
        if ($stringOne != $stringTwo) {
            return ucfirst($type) . ' must be same as second ' . $type;
        }
        return '';
    }

    /**
     * @param $password
     * @return string
     */
    public function checkPassword($password)
    {
        $nonValidSymbols = 0;
        for($i = 0; $i < strlen($password); $i++){
            if (!(is_numeric($password[$i]) ||
                !ctype_lower($password) ||
                !ctype_upper($password))) {
                $nonValidSymbols++;
            }
        }
        return ($nonValidSymbols > 0) ? 'Password must contain number, lower and upper symbols!' : '';
    }

    /**
     * @param $email
     * @return string
     */
    public function isEmailValid($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Email is not valid!';
        }
        return '';
    }

    /**
     * @param $phone
     * @return string
     */
    public function isPhoneValid($phone)
    {
        if (!preg_match('/^[+][3][8][0][0-9]{2}[-][0-9]{2}[-][0-9]{2}[-][0-9]{3}+$/',$phone)) {
            return 'Phone is not valid!';
        }
        return '';
    }

    /**
     * @param array $inputData
     * @return string
     */
    public function checkAllField($inputData)
    {
        $emptyField = [];
        foreach ($inputData as $key=>$item) {
            if (empty($item) && $item !==0) {
                $emptyField[] = $key;
            }
        }
        return (!empty($emptyField)) ? 'Please enter field '. implode(', ',$emptyField) .'!' : '';
    }

    /**
     * @return bool
     */
    public function IsUseLoged()
    {
       return !isset($_SESSION['loggedUser']) ? false : true;

    }
}
