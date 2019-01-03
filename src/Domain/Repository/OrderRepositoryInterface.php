<?php
namespace Sebs\Tca\Domain\Repository;

use Sebs\Tca\Domain\Entity\Order;

/**
 * @package Sebs\Tca\Domain\Repository
 */
interface OrderRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Order[]
     */
    public function getUninvoicedOrders();
}
