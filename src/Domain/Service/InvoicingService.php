<?php
namespace Sebs\Tca\Domain\Service;

use Sebs\Tca\Domain\Entity\Invoice;
use Sebs\Tca\Domain\Factory\InvoiceFactory;
use Sebs\Tca\Domain\Repository\OrderRepositoryInterface;

/**
 * @package Sebs\Tca\Domain\Service
 */
class InvoicingService
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     * @var
     */
    protected $invoiceFactory;

    /**
     * @param OrderRepositoryInterface $orderRepository
     * @param InvoiceFactory $invoiceFactory
     */
    public function __construct(OrderRepositoryInterface $orderRepository, InvoiceFactory $invoiceFactory)
    {
        $this->orderRepository = $orderRepository;
        $this->invoiceFactory = $invoiceFactory;
    }

    /**
     * @return Invoice[]
     */
    public function generateInvoices()
    {
        $orders = (array)$this->orderRepository->getUninvoicedOrders();
        $invoices = [];

        foreach ($orders as $order) {
            $invoices[] = $this->invoiceFactory->createFromOrder($order);
        }
        return $invoices;
    }
}
