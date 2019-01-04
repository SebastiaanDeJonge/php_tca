<?php
use Sebs\Tca\Domain\Entity\Invoice;
use Sebs\Tca\Domain\Entity\Order;
use Sebs\Tca\Domain\Factory\InvoiceFactory;

describe('InvoiceFactory', function() {
    describe('->createFromOrder()', function() {
        it('should return an invoice object', function() {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            assert($invoice instanceof Invoice, 'should be an instance of Invoice');
        });

        it('should set the total of the invoice', function() {
            $total = 2142356;
            $order = new Order();
            $order->setTotal($total);
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            assert($invoice->getTotal() === $total, 'should associate the Order to the invoice');
        });

        it('should set the date of the invoice', function() {
            $dateFormat = 'Y-m-d';
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            assert(
                $invoice->getInvoiceDate()->format($dateFormat) === (new DateTime())->format($dateFormat),
                'should set the date of the invoice'
            );
        });
    });
});
