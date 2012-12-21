<?php
namespace Ddnet\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Ddnet\PortfolioBundle\Entity\Repository\ProjectRepository")
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
     * @var string $name The name of the project
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\MaxLength(150)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var string $description The project's description
     * 
     * @ORM\Column(name="description", type="text")
     * 
     */
    protected $description;

    /**
     * @var string $dev_url The url to the dev files
     * 
     * @ORM\Column(name="dev_url", type="string") 
     * @Assert\Url()
    */
    protected $dev_url;

    /**
     * @var string $prod_url The url to the prod files
     * 
     * @ORM\Column(name="prod_url", type="string")
     * @Assert\Url()
     */
    protected $prod_url;

    /**
     * @var Ddnet\PortfolioBundle\Entity\ProjectCategory $category The project's default category
     * 
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="ProjectCategory", inversedBy="projects")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @var Ddnet\PortfolioBundle\Entity\ProjectStatus $status The project's status
     * 
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="ProjectStatus", inversedBy="projects")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    protected $status;

    /**
     * @var Ddnet\BillingBundle\Entity\Client $client The client for the project.
     * 
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="Ddnet\BillingBundle\Entity\Client", inversedBy="projects")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;

    /**
     * @var Ddnet\UserBundle\Entity\User $user A user to the system.
     * 
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="Ddnet\UserBundle\Entity\User", inversedBy="projects")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
  
    /**
     * @var string $github_repo
     *
     * @ORM\Column(name="github_repo", type="string")
     * @Assert\MaxLength(150)
     */
    private $github_repo;

    /**
     * @var string $github_branch
     *
     * @ORM\Column(name="github_branch", type="string")
     * @Assert\MaxLength(100)
     */
    private $github_branch;

    /**
     * @var string $github_user
     *
     * @ORM\Column(name="github_user", type="string")
     * @Assert\MaxLength(100)
     */
    private $github_user;

    /**
     * @var string $version
     *
     * * @ORM\Column(name="version", type="string")
     * @Assert\MaxLength(50)
     */
    protected $version = "1.0";

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created")
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated")
     */
    protected $updated;

    /**
     * @var string $slug
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(unique=true)
     * @Assert\MaxLength(128)
     */
    protected $slug;  
    
    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;    
}