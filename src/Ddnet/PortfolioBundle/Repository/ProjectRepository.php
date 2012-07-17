<?php
  namespace Ddnet\PortfolioBundle\Repository;

  use Doctrine\ORM\EntityRepository;

  class ProjectRepository extends EntityRepository {
    public function filterByStatus($status) {
      return $this->getEntityManager()
                  ->createQuery('SELECT p FROM DdnetPortfolioBundle:Project p WHERE (p.status_id = :status) ORDER BY p.name ASC')
                  ->setParameter('status', $status->getId())
                  ->getResult();
    }

    public function getAllByName($direction='ASC') {
      return $this->getEntityManager()
                  ->createQuery('SELECT p FROM DdnetPortfolioBundle:Project p ORDER BY p.name :direction')
                  ->setParameter('direction', $direction)
                  ->getResult();
    }
  }
