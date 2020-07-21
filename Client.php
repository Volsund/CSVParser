<?php

class Client
{
    public $name;
    public $surname;
    public $address;
    public $city;
    public $gender;
    public $soc_security_num;

    public function __construct
    (
        ?string $name = '',
        ?string $surname = '',
        ?string $address = '',
        ?string $city = '',
        ?string $gender = '',
        ?string $soc_security_num = '')
    {
        $this->name = $name ? $name : '';
        $this->surname = $surname ? $surname : '';
        $this->address = $address ? $address : '';
        $this->city = $city ? $city : '';
        $this->gender = $gender ? $gender : '';
        $this->soc_security_num = $soc_security_num ? $soc_security_num : '';
    }
}