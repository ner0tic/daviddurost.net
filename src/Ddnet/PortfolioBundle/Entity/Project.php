<?php

namespace Ddnet\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Ddnet\PortfolioBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="name", type="string", length=150)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string $dev_url
     *
     * @ORM\Column(name="dev_url", type="string", length=200, nullable=true)
     */
    private $dev_url;

    /**
     * @var string $prod_url
     *
     * @ORM\Column(name="prod_url", type="string", length=200, nullable=true)
     */
    private $prod_url;

    /**
     * @var string $github_repo
     *
     * @ORM\Column(name="github_repo", type="string", length=150, nullable=true)
     */
    private $github_repo;

    /**
     * @var string $github_branch
     *
     * @ORM\Column(name="github_branch", type="string", length=100, nullable=true)
     */
    private $github_branch;

    /**
     * @var string $github_user
     *
     * @ORM\Column(name="github_user", type="string", length=100, nullable=true)
     */
    private $github_user;

    /**
     * @var string $version
     *
     * * @ORM\Column(name="version", type="string", length=50, nullable=true)
     */
    private $version = "1.0";

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
     * @var Ddnet\PortfolioBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="projects")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var Ddnet\PortfolioBundle\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="projects")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @var Ddnet\BillingBundle\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="\Ddnet\BillingBundle\Entity\Client", inversedBy="projects")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="Skill", mappedBy="project")
     */
    private $skills;


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
     * @return Project
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
     * @return Project
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
     * Set dev_url
     *
     * @param string $devUrl
     * @return Project
     */
    public function setDevUrl($devUrl)
    {
        $this->dev_url = $devUrl;
        return $this;
    }

    /**
     * Get dev_url
     *
     * @return string
     */
    public function getDevUrl()
    {
        return $this->dev_url;
    }

    /**
     * Set prod_url
     *
     * @param string $prodUrl
     * @return Project
     */
    public function setProdUrl($prodUrl)
    {
        $this->prod_url = $prodUrl;
        return $this;
    }

    /**
     * Get prod_url
     *
     * @return string
     */
    public function getProdUrl()
    {
        return $this->prod_url;
    }

    /**
     * Set github_repo
     *
     * @param string $githubRepo
     * @return Project
     */
    public function setGithubRepo($githubRepo)
    {
        $this->github_repo = $githubRepo;
        return $this;
    }

    /**
     * Get github_repo
     *
     * @return string
     */
    public function getGithubRepo()
    {
        return $this->github_repo;
    }

    /**
     * Set github_branch
     *
     * @param string $githubBranch
     * @return Project
     */
    public function setGithubBranch($githubBranch)
    {
        $this->github_branch = $githubBranch;
        return $this;
    }

    /**
     * Get github_branch
     *
     * @return string
     */
    public function getGithubBranch()
    {
        return $this->github_branch;
    }

    /**
     * Set github_user
     *
     * @param string $githubUser
     * @return Project
     */
    public function setGithubUser($githubUser)
    {
        $this->github_user = $githubUser;
        return $this;
    }

    /**
     * Get github_user
     *
     * @return string
     */
    public function getGithubUser()
    {
        return $this->github_user;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Project
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set created
     *
     * @param datetime $created
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * Set category
     *
     * @param Ddnet\PortfolioBundle\Entity\Category $category
     * @return Project
     */
    public function setCategory(\Ddnet\PortfolioBundle\Entity\Category $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Ddnet\PortfolioBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set status
     *
     * @param Ddnet\PortfolioBundle\Entity\status $status
     * @return Project
     */
    public function setStatus(\Ddnet\PortfolioBundle\Entity\status $status = null)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return Ddnet\PortfolioBundle\Entity\status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set client
     *
     * @param Ddnet\BillingBundle\client $client
     * @return Project
     */
    public function setClient(\Ddnet\BillingBundle\Entity\client $client = null)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get client
     *
     * @return Ddnet\BillingBundle\client
     */
    public function getClient()
    {
        return $this->client;
    }
    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
      return $this->getName();
    }

    /**
     * Add skills
     *
     * @param Ddnet\PortfolioBundle\Entity\Skill $skills
     * @return Project
     */
    public function addSkill(\Ddnet\PortfolioBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;
        return $this;
    }

    /**
     * Get skills
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }
}