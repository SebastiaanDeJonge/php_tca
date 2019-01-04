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

            assert($invoice instanceof Invoice, 'instance of Invoice');
        });
    });
});
