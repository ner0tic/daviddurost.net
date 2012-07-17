<?php

namespace Ddnet\GithubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asset;

/**
 * @ORM\Entity
 * @ORM\Table(name="github")
 */
class GithubClient {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=100, name="username")
   * @var string $username 
   */
  protected $username;
  
  /**
   * ORM\Column(type="string", length=150, name="repository")
   * @var string $repository
   */
  protected $repository;
  
  /**
   * @ORM\Column(type="string", length=100, name="branch", nullable=true)
   * @var string $branch
   */
  protected $branch = 'master';
  
  /**
   * @ORM\Column(type="string", length=250, name="gh_id", unique=true, nullable=true)
   * @var type 
   */
  private   $gh_id;
  
  /**
   * @ORM\Column(type="string", length=100, name="table_name", nullable=true)
   * @var string $table_name 
   */
  protected $table_name;
  
  /**
   * @ORM\Column(type="integer", name="table_id", nullable=true)
   * @var integer $table_id 
   */
  protected $table_id;
  

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
     * Set username
     *
     * @param string $username
     * @return GithubClient
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set branch
     *
     * @param string $branch
     * @return GithubClient
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
        return $this;
    }

    /**
     * Get branch
     *
     * @return string 
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set gh_id
     *
     * @param string $ghId
     * @return GithubClient
     */
    public function setGhId($ghId)
    {
        $this->gh_id = $ghId;
        return $this;
    }

    /**
     * Get gh_id
     *
     * @return string 
     */
    public function getGhId()
    {
        return $this->gh_id;
    }

    /**
     * Set table_name
     *
     * @param string $tableName
     * @return GithubClient
     */
    public function setTableName($tableName)
    {
        $this->table_name = $tableName;
        return $this;
    }

    /**
     * Get table_name
     *
     * @return string 
     */
    public function getTableName()
    {
        return $this->table_name;
    }

    /**
     * Set table_id
     *
     * @param integer $tableId
     * @return GithubClient
     */
    public function setTableId($tableId)
    {
        $this->table_id = $tableId;
        return $this;
    }

    /**
     * Get table_id
     *
     * @return integer 
     */
    public function getTableId()
    {
        return $this->table_id;
    }
}