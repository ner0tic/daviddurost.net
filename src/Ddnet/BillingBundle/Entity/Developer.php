<?php

namespace Ddnet\BillingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ddnet\BillingBundle\Entity\Developer
 */
class Developer
{
    /**
     * @var string $street
     */
    private $street;

    /**
     * @var string $suburb
     */
    private $suburb;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @var string $zone
     */
    private $zone;

    /**
     * @var string $country
     */
    private $country;

    /**
     * @var string $postal_code
     */
    private $postal_code;

    /**
     * @var string $phone
     */
    private $phone;

    /**
     * @var string $slug
     */
    private $slug;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $first_name
     */
    private $first_name;

    /**
     * @var string $last_name
     */
    private $last_name;

    /**
     * @var string $email_address
     */
    private $email_address;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var string $twitter
     */
    private $twitter;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set street
     *
     * @param string $street
     * @return Developer
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
     * @return Developer
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
     * @return Developer
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
     * @return Developer
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
     * @return Developer
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
     * @return Developer
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
     * @return Developer
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
     * Set slug
     *
     * @param string $slug
     * @return Developer
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Developer
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
     * @return Developer
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
     * Set email_address
     *
     * @param string $emailAddress
     * @return Developer
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
     * @return Developer
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
     * @return Developer
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
     * Add projects
     *
     * @param Ddnet\PortfolioBundle\Entity\Project $projects
     * @return Developer
     */
    public function addProject(\Ddnet\PortfolioBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;
        return $this;
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

    /**
     * Get projects
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}