<?php
namespace Ddnet\UserBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException,
    Symfony\Component\Security\Core\Exception\UnsupportedUserException,
    Symfony\Component\Security\Core\User\UserProviderInterface,
    Symfony\Component\Security\Core\User\UserInterface,
    \BaseFacebook;

class FacebookProvider implements UserProviderInterface
{
    /**
     * @var \Facebook;
     */
    protected $facebook;
    protected 
            $userManager,
            $validator;
    
    public function __construct( BaseFacebook $facebook, $userManager, $validator )
    {
        $this->facebook = $facebook;
        $this->userManager = $userManager;
        $this->validator = $validator;
    }
    
    public function supportsClass( $class )
    {
        return $this->userManager->supportsClass( $class );
    }

    public function findUserByFbId( $fbId )
    {
        return $this->userManager->findUserBy( array(
            'facebookID'    =>  $fbId
        ) );
    }

    public function loadUserByUsername( $username )
    {
        $user = $this->findUserByFbId( $username );

        try {
            $fbdata = $this->facebook->api( '/me' );
        } catch ( FacebookApiException $e ) 
        {
            $fbdata = null;
        }

        if( !empty( $fbdata ) ) 
        {
            $user_by_mail = $this->userManager->findUserBy( array(
                'email' =>  $fbdata[ 'email' ]
            ) );

            if( !empty( $user_by_mail ) )
            {
                $user = $user_by_mail;
            }
            elseif( empty( $user ) ) 
            {
                $user = $this->userManager->createUser();
                $user->setEnabled( true );
                $user->setPassword( '' );
            }

            $user->setFBData( $fbdata );

            if( count( $this->validator->validate( $user, 'Facebook' ) ) )
            {
                throw new UsernameNotFoundException( 'The facebook user could not be stored' );
            }

            $this->userManager->updateUser( $user );
        }

        if( empty( $user ) )
        {
            throw new UsernameNotFoundException( 'The user is not authenticated on facebook' );
        }

        return $user;
    }

    public function refreshUser( UserInterface $user )
    {
        if( !$this->supportsClass( get_class( $user ) ) || !$user->getFacebookId() )
        {
            throw new UnsupportedUserException( sprintf( 'Instances of "%s" are not supported.', get_class( $user ) ) );
        }

        return $this->loadUserByUsername( $user->getFacebookId() );
    }    
}
