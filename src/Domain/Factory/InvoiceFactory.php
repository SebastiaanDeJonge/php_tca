<?php
namespace Sebs\Tca\Domain\Factory;

use Sebs\Tca\Domain\Entity\Invoice;
use Sebs\Tca\Domain\Entity\Order;

/**
 * @package Sebs\Tca\Domain\Factory
 */
class InvoiceFactory
{
    /**
     * @param Order $order
     * @return Invoice
     */
    public function createFromOrder(Order $order)
    {
        return new Invoice();
    }
}
