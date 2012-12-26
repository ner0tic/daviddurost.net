<?php

namespace Ddnet\BillingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="billing_detail")
 * @ORM\Entity(repositoryClass="Ddnet\BillingBundle\Entity\Repository\BillingDetailRepository")
 */
class BillingDetail {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var Ddnet\PortfolioBundle\Entity\Project
   *
   * @ORM\ManyToOne(targetEntity="Ddnet\PortfolioBundle\Entity\Project", inversedBy="billingDetails")
   * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
   */
  protected $project_id;

  /**
   *
   * @var enum $types
   * 
   * @ORM\Column(type="string", columnDefinition="ENUM('hourly', 'flat rate', 'free of charge')") 
   */
  protected $types;

  /**
   * @var enum $terms
   * 
   * @ORM\Column(name="terms", type="string", columnDefinition="ENUM('120', '220', '320', '420', '520', '620')")
   */
  protected $terms = '120';

  /**
   * @var interger $billing_rate
   * 
   * @ORM\Column(name="billing_rate", type="integer")
   */
  protected $billing_rate;

  /**
   * @var datetime $created
   *
   * @Gedmo\Timestampable(on="create")
   * @ORM\Column(type="datetime")
   */
  private $created;

  /**
   * @var datetime $updated
   *
   * @Gedmo\Timestampable(on="update")
   * @ORM\Column(type="datetime")
   */
  private $updated;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set types
     *
     * @param string $types
     * @return BillingDetail
     */
    public function setTypes($types)
    {
        $this->types = $types;
        return $this;
    }

    /**
     * Get types
     *
     * @return string 
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Set terms
     *
     * @param string $terms
     * @return BillingDetail
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
        return $this;
    }

    /**
     * Get terms
     *
     * @return string 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set billing_rate
     *
     * @param integer $billingRate
     * @return BillingDetail
     */
    public function setBillingRate($billingRate)
    {
        $this->billing_rate = $billingRate;
        return $this;
    }

    /**
     * Get billing_rate
     *
     * @return integer 
     */
    public function getBillingRate()
    {
        return $this->billing_rate;
    }

    /**
     * Set created
     *
     * @param datetime $created
     * @return BillingDetail
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     * @return BillingDetail
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set project_id
     *
     * @param Ddnet\PortfolioBundle\Entity\Project $projectId
     * @return BillingDetail
     */
    public function setProjectId(Ddnet\PortfolioBundle\Entity\Project $projectId = null)
    {
        $this->project_id = $projectId;
        return $this;
    }

    /**
     * Get project_id
     *
     * @return Ddnet\PortfolioBundle\Entity\Project
     */
    public function getProjectId()
    {
        return $this->project_id;
    }
}