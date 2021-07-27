<?php


namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;

class Salary
{
    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @var string A "d-m-Y" formatted value
     */
    public $sellDate;


    /**
     * @Assert\NotBlank()
     * @Assert\Choice({"cash","card"})
     */
    public $paymentMethods;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=9,max=9)
     * @var integer
     */
    public $phoneNumber;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $salesDocNumber;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $name;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $surname;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @var string A "d-m-Y" formatted value
     */
    public $dateSalesDoc;

    /**
     * @Assert\NotBlank()
     * @var integer
     */
    public $price;
}