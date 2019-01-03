<?php
namespace Sebs\Tca\Domain\Repository;

use Sebs\Tca\Domain\Entity\AbstractEntity;

/**
 * @package Sebs\Tca\Domain\Repository
 */
interface RepositoryInterface
{
    /**
     * @param int $id
     * @return AbstractEntity
     */
    public function getById(int $id);

    /**
     * @return AbstractEntity[]
     */
    public function getAll();

    /**
     * @param AbstractEntity $entity
     * @return void
     */
    public function save($entity);

    /**
     * @return void
     */
    public function begin();

    /**
     * @return void
     */
    public function commit();
}
