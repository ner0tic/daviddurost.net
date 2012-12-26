<?php

namespace Ddnet\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="Ddnet\PortfolioBundle\Entity\Repository\ProjectStatusRepository")     
 */
class ProjectStatus
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     * 
     * @ORM\Column(name="name", type="string")
     * @Assert\MaxLength(150)
     */
    private $name;

    /**
     * @var text $description
     * 
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated")
     */
    private $updated; 
    
    /**
     * @var string $slug
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Project", mappedBy="status")
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }
    
    public function __toString() {
      return $this->getName();
    }
    
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
     * Set name
     *
     * @param string $name
     * @return ProjectStatus
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return ProjectStatus
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param datetime $created
     * @return ProjectStatus
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
     * @return ProjectStatus
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
     * Set slug
     *
     * @param string $slug
     * @return ProjectStatus
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add projects
     *
     * @param Ddnet\PortfolioBundle\Entity\Project $project
     * @return ProjectStatus
     */
    public function addProject(\Ddnet\PortfolioBundle\Entity\Project $project)
    {
        $this->projects[] = $project;
        return $this;
    }

    /**
     * Get projects
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Remove projects
     *
     * @param Ddnet\PortfolioBundle\Entity\Project $projects
     */
    public function removeProject(\Ddnet\PortfolioBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }
}