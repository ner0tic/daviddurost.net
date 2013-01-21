<?php
namespace Ddnet\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
        
    Symfony\Component\HttpFoundation\File\UploadedFile,
    Symfony\Component\Validator\Constraints as Assert,
        
    Gedmo\Mapping\Annotation as Gedmo,
    Vich\UploaderBund;e\Mapping\Annotation as Vich,

    Imagine;

/**
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Ddnet\PortfolioBundle\Entity\Repository\ProjectRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(
     *      name="name", 
     *      type="string"
     * )
     * @Assert\MaxLength(150)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var string $description The project's description
     * 
     * @ORM\Column(
     *      name="description", 
     *      type="text"
     * )
     * 
     */
    protected $description;

    /**
     * @var string $dev_url The url to the dev files
     * 
     * @ORM\Column(
     *      name="dev_url", 
     *      type="string"
     * ) 
     * @Assert\Url()
    */
    protected $dev_url;

    /**
     * @var string $prod_url The url to the prod files
     * 
     * @ORM\Column(
     *      name="prod_url", 
     *      type="string"
     * )
     * @Assert\Url()
     */
    protected $prod_url;
    
    /**
     *
     * @var string $thumbnail
     * 
     * @Assert\File(
     *      maxSize="4M", 
     *      mimeTypes={"images/png", "image/jpeg", "image/gif"}
     * )
     * @Vich\UploadableField(
     *      mapping="project_thumbnail",
     *      fileNameProperty="image"
     * )
     */
    protected $thumbnailFile;
    
    /**
     *
     * @var string $thumbnail
     * 
     * @ORM\Column(
     *      name="thumbnail",
     *      type="string",
     *      length=255,
     *      nullable=true
     * )
     */
    private $thumbnail;
    
    /**
     * @var string $imageFile
     * 
     * @Assert\File(
     *      maxSize="4M",
     *      mimeTypes={"images/png", "images/png", "image/gif"}
     * )
     * @Vich\UploadableField(
     *      mapping="project_image",
     *      fileNameProperty="image"
     * )
     */
    protected $imageFile;
            
    /**
     * @var string $photo
     * 
     * @ORM\Column(
     *      name="imageo", 
     *      type="string",
     *      length=255,
     *      nullable=true
     * )
     * @Assert\Image()
     */
    private $image;

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
     * @ORM\Column(name="github_repo", type="string", nullable=true)
     * @Assert\MaxLength(150)
     */
    protected $github_repo;

    /**
     * @var string $github_branch
     *
     * @ORM\Column(name="github_branch", type="string", nullable=true)
     * @Assert\MaxLength(100)
     */
    protected $github_branch;

    /**
     * @var string $github_user
     *
     * @ORM\Column(name="github_user", type="string", nullable=true)
     * @Assert\MaxLength(100)
     */
    protected $github_user;

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
     * Set position
     *
     * @param integer $position
     * @return Project
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set category
     *
     * @param Ddnet\PortfolioBundle\Entity\ProjectCategory $category
     * @return Project
     */
    public function setCategory(\Ddnet\PortfolioBundle\Entity\ProjectCategory $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Ddnet\PortfolioBundle\Entity\ProjectCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set status
     *
     * @param Ddnet\PortfolioBundle\Entity\ProjectStatus $status
     * @return Project
     */
    public function setStatus(\Ddnet\PortfolioBundle\Entity\ProjectStatus $status = null)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return Ddnet\PortfolioBundle\Entity\ProjectStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param Ddnet\UserBundle\Entity\User $user
     * @return Project
     */
    public function setUser(\Ddnet\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return Ddnet\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     * @return Project
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string 
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }
    
    /**
     * Remove thumbnail image file
     * 
     * @return boolean
     */
    public function removeThumbnail()
    {
        if( $this->getImagePath() && \file_exists( $this->getImagePath() ) )
        {
            unlink( $this->getImagePath() );
            
            return true;            
        }
        
        return false;
    }
    
    /**
     * Set thumbnailFile
     * 
     * @param File $thumbnailFile
     * @return \Ddnet\PortfolioBundle\Entity\Project
     */
    public function setThumbnailFile( $thumbnailFile )
    {
        if( null == $thumbnailFile )
        {
            return;
        }
        
        $this->thumbnailFile = $thumbnailFile;
        
        return $this;
    }
    
    /**
     * Get thumbnailFile
     * 
     * @return File
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Project
     */
    public function setImage( $image )
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Remove image file
     * 
     * @return boolean
     */
    public function removeImage()
    {
        if( $this->getImagePath() && \File_exists( $this->getImagePAth() ) )
        {
            unlink( $this->getImagePath() );
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Set imageFile
     * 
     * @param type $imageFile
     * 
     * @return Project
     */
    public function setImageFile( $imageFile )
    {
        if( null == $imageFile )
        {
            return $this;
        }
        
        $this->imageFile = $imageFile;
    }
    
    /**
     * Get imageFile
     * 
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
}