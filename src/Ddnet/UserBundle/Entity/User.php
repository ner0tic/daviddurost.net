<?php
// src/Ddnet/UserBundle/Entity/User.php

namespace Ddnet\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser,
    Gedmo\Mapping\Annotation as Gedmo,
    Doctrine\ORM\Mapping as ORM,
    Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Gedmo\Slug(fields={"username"}) 
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;
    
    /**
     * @var string $first_name
     * 
     * @ORM\Column(type="string", name="first_name")
     * @Assert\MaxLength(150)
     * @Assert\NotBlank(message="Please enter your first name.", groups={"Registration", "Profile"})
     */
    protected $first_name;
    
    /**
     * @var string $last_name
     * 
     * @ORM\Column(type="string", name="last_name")
     * @Assert\MaxLength(150)
     * @Assert\NotBlank(message="Please enter your last name.", groups={"Registration", "Profile"})
     */
    protected $last_name;
    
    /**
     * @var string $url
     * 
     * @ORM\Column(type="string", name="url", nullable=true)
     * @Assert\Url()
     */
    protected $url;    
    
    /**
     *
     * @var string
     * @ORM\Column( type="string", nullable=true)
     */
    protected $facebookID;    
    
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

    public function __construct()
    {
        parent::__construct();
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
     * Set slug
     *
     * @param string $slug
     * @return User
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
     * Set first_name
     *
     * @param string $firstName
     * @return User
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
     * @return User
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
     * @param string $facebookID
     * @return void
     */
    public function setFacebookID( $facebookID = null )
    {
        $this->facebookID = $facebookID;
        
        if( $this->username == "" )
        {
            $this->setUsername( $facebookID );
        }
        $this->salt = '';
    }
    
    /**
     * @return string
     */
    public function getFacbookID() 
    {
        return $this->facebookID;
    }
    
    /**
     * @param Array
     */
    public function setFBData( $fbdata )
    {
        if( isset( $fbdata[ 'id' ] ) ) 
        {
            $this->setFacebookID( $fbdata[ 'id' ] );
            $this->addRole( 'ROLE_USER' );
        }
        
        if( isset( $fbdata[ 'first_name' ] ) )
        {
            $this->setFirstName( $fbdata[ 'first_name' ] );
        }
        
        if( isset( $fbdata[ 'last_name' ] ) )
        {
            $this->setLastName( $fbdata[ 'last_name' ] );
        }
        
        if( isset( $fbdata[ 'email'] ) )
        {
            $this->setEmail( $fbdata[ 'email' ] );
            $this->setUpdated( $fbdata[ 'email' ] );
        }
    }    
    
    public function serialize() {
        return serialize( array( $this->facebookID, parent::serialize() ) );
    }
    
    public function unserialize( $data )
    {
        list( $this->facebookID, $parentData) = unserialize( $data );
        parent::unserialize( $parentData );
    }

    /**
     * Set created
     *
     * @param datetime $created
     * @return User
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
     * @return User
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
     * Set url
     *
     * @param string $url
     * @return User
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
     * @return User
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
}