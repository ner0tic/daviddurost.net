<?php

namespace Ddnet\BillingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client {

  /**
   * @var integer $id
   * 
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string $company_name
   * 
   * @ORM\Column(name="company_name", type="string", length=150, nullable=true)
   */
  protected $company_name;
  
  /**
   * @var string $first_name
   * 
   * @ORM\Column(type="string", length=100, name="first_name")
   */
  protected $first_name;
  
  /**
   * @var string $last_name
   * 
   * @ORM\Column(type="string", length=100, name="last_name")
   */
  protected $last_name;
  
  /**
   * @var string $street
   * 
   * @ORM\Column(type="string", length=150, name="street")
   */
  protected $street;
  
  /**
   * @var string $suburb
   * 
   * @ORM\Column(type="string", length=150, name="suburb", nullable=true)
   */
  protected $suburb;
  
  /**
   * @var string $city
   * 
   * @ORM\Column(type="string", length=150, name="city")
   */
  protected $city;
  
  /**
   * @var string $zone
   * 
   * @ORM\Column(type="string", length=150, name="zone")
   */
  protected $zone;
  
  /**
   * @var string $country
   * 
   * @ORM\Column(type="string", length=150, name="country")
   */
  protected $country = "United States";
  
  /**
   * @var string $postal_code
   * 
   * @ORM\Column(type="string", length=10, name="postal_code", nullable=true)
   */
  protected $postal_code;
  
  /**
   * @var string $phone
   * 
   * @ORM\Column(type="string", length=12, name="phone")
   */
  protected $phone;
  
  /**
   * @var string $fax
   * 
   * @ORM\Column(type="string", length=12, name="fax", nullable=true)
   */
  protected $fax;
  
  /**
   * @var string $email_address
   * 
   * @ORM\Column(type="string", length=150, name="email_address")
   */
  protected $email_address;
  
  /**
   * @var string $url
   * 
   * @ORM\Column(type="string", length=150, name="url", nullable=true)
   */
  protected $url;
  
  /**
   * @var string $twitter
   * 
   * @ORM\Column(type="string", length=150, name="twitter", nullable=true)
   */
  protected $twitter;
  
  protected $user;
  
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
   * @Gedmo\Slug(fields={"company_name"}) 
   * @ORM\Column(length=128, unique=true)
   */
  protected $slug;
  
  /**
   * @var type 
   * 
   * @ORM\OneToMany(targetEntity="Ddnet\PortfolioBundle\Entity\Project", mappedBy="client")
   */
  protected $projects;
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set company_name
     *
     * @param string $companyName
     * @return Client
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;
        return $this;
    }

    /**
     * Get company_name
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Client
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Client
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Client
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set suburb
     *
     * @param string $suburb
     * @return Client
     */
    public function setSuburb($suburb)
    {
        $this->suburb = $suburb;
        return $this;
    }

    /**
     * Get suburb
     *
     * @return string 
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Client
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zone
     *
     * @param string $zone
     * @return Client
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
        return $this;
    }

    /**
     * Get zone
     *
     * @return string 
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Client
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postal_code
     *
     * @param string $postalCode
     * @return Client
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;
        return $this;
    }

    /**
     * Get postal_code
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Client
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Client
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email_address
     *
     * @param string $emailAddress
     * @return Client
     */
    public function setEmailAddress($emailAddress)
    {
        $this->email_address = $emailAddress;
        return $this;
    }

    /**
     * Get email_address
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Client
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Client
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set created
     *
     * @param datetime $created
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * @param Ddnet\PortfolioBundle\Entity\Project $projects
     * @return Client
     */
    public function addProject(\Ddnet\PortfolioBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;
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
    
    public function getName() {
      if(is_null($this->getCompanyName()))
        return $this->getFirstName().' '.$this->getLastName();
      return $this->getCompanyName();
    }
    
    public function __toString() {
      return $this->getName();
    }
}