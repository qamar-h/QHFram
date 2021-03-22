<?php

namespace App\Entity\Interface;

interface PersonneInterface {

    function getName() : string;

    function getFirstname() : string;

    function getAvatar() : ?string;
}