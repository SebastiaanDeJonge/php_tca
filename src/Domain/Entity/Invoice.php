<?php
namespace Sebs\Tca\Domain\Entity;

use DateTime;

/**
 * @package Sebs\Tca\Domain\Entity
 */
class Invoice extends AbstractEntity
{
    /**
     * @var int
     */
    protected $order;

    /**
     * @var DateTime
     */
    protected $invoiceDate;

    /**
     * @var float
     */
    protected $total;

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return self
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param DateTime $invoiceDate
     * @return self
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
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
