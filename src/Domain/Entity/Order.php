<?php
namespace Sebs\Tca\Domain\Entity;

/**
 * @package Sebs\Tca\Domain\Entity
 */
class Order extends AbstractEntity
{
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $total;

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return self
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return self
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }
}
