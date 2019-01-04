<?php
use Sebs\Tca\Domain\Entity\Invoice;
use Sebs\Tca\Domain\Entity\Order;
use Sebs\Tca\Domain\Factory\InvoiceFactory;
use Sebs\Tca\Domain\Repository\OrderRepositoryInterface;
use Sebs\Tca\Domain\Service\InvoicingService;

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

describe('InvoicingService', function() {
    describe('->generateInvoices()', function() {
        beforeEach(function() {
            $this->repository = $this->getProphet()->prophesize(OrderRepositoryInterface::class);
            $this->factory = $this->getProphet()->prophesize(InvoiceFactory::class);
        });

        it('should query the repository for uninvoiced Orders', function() {
            $this->repository->getUninvoicedOrders()->shouldBeCalled();
            $service = new InvoicingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $service->generateInvoices();
        });

        afterEach(function() {
            $this->getProphet()->checkPredictions();
        });

        it('should return an Invoice for each unvoiced Order', function() {
            $orders = [(new Order())->setTotal(512)];
            $invoices = [(new Invoice())->setTotal(512)];

            $this->repository->getUninvoicedOrders()->willReturn($orders);
            $this->factory->createFromOrder($orders[0])->willReturn($invoices[0]);

            $service = new InvoicingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $results = $service->generateInvoices();

            assert(is_array($results));
            assert(count($results) === count($orders));
        });
    });
});
