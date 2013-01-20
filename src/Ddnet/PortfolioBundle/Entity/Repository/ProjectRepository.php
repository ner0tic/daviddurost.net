<?php
namespace Ddnet\PortfolioBundle\Entity\Repository;

use Gedmo\Sortable\Entity\Repository\SortableRepository;

class ProjectRepository extends SortableRepository 
{
    public function findAllOrderedByUpdated()
    {
        return $this->getEntityManager()
                    ->createQuery( 'SELECT p FROM DdnetPortfolioBundle:Project p ORDER BY p.updated ASC' )
                    ->getResult();
    }
}

