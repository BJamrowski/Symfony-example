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
    protected $sellDate;


    /**
     * @Assert\NotBlank()
     */
    protected $paymentMethods;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    protected $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=9,max=9)
     * @var integer
     */
    protected $phoneNumber;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    protected $salesDocNumber;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    protected $name;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    protected $surname;

    /**
     * @Assert\Date()
     * @var string A "d-m-Y" formatted value
     */
    private $dateSalesDoc;

    /**
     * @Assert\NotBlank()
     * @var integer
     */
    protected $price;

    /**
     * @return string
     */
    public function getSellDate(): ?string
    {
        return $this->sellDate;
    }

    /**
     * @param string $sellDate
     */
    public function setSellDate(string $sellDate): void
    {
        $this->sellDate = $sellDate;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * @param mixed $paymentMethods
     */
    public function setPaymentMethods($paymentMethods): void
    {
        $this->paymentMethods = $paymentMethods;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    /**
     * @param int $phoneNumber
     */
    public function setPhoneNumber(int $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getSalesDocNumber(): ?string
    {
        return $this->salesDocNumber;
    }

    /**
     * @param string $salesDocNumber
     */
    public function setSalesDocNumber(string $salesDocNumber): void
    {
        $this->salesDocNumber = $salesDocNumber;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getDateSalesDoc(): ?string
    {
        return $this->dateSalesDoc;
    }

    /**
     * @param string $dateSalesDoc
     */
    public function setDateSalesDoc(string $dateSalesDoc): void
    {
        $this->dateSalesDoc = $dateSalesDoc;
    }

    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function __toString()
    {
        return $this->getName();
    }


}