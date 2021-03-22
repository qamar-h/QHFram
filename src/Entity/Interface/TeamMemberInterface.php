<?php

namespace App\Entity\Interface;

interface TeamMemberInterface {

    function getSocialNetwordk() : array;

    function getRoles(): array;

    function getDescription() : ?string;



}