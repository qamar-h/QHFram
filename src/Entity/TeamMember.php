<?php

namespace App\Entity;

use App\Entity\Interface\PersonneInterface;
use App\Entity\Interface\TeamMemberInterface;


class TeamMember implements PersonneInterface, TeamMemberInterface {

    private $name;

    private $firstname;

    private $avatar;

    private $socialNetwork;

    private $roles;

    private $description;


    public function __construct(string $name, string $firstname, string $avatar = null, array $socialNetwork = [],array $roles =  [], string $description =  null){

        $this->name = $name;
        $this->firstname = $firstname;
        $this->avatar = $avatar;
        $this->socialNetwork = $socialNetwork;
        $this->roles = $roles;
        $this->description = $description;
    }

        
    
    function getName() : string{

        return $this->name;
    }

    function getFirstname() : string{

        return $this->firstname;
    }

    function getAvatar() : ?string{

        return $this->avatar;
    }

    function getSocialNetwordk() : array{

        return $this->socialNetwork;
    }

    function getRoles(): array{

        return $this->roles;
    }

    function getDescription() : ?string{

        return $this->description;
    }

}