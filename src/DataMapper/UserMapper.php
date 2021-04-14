<?php

namespace App\DataMapper;

use Core\Component\ORM\AbstractDataMapper;
use Core\Component\ORM\EntityInterface;
use App\Entity\User;


class UserMapper extends AbstractDataMapper
{
    protected $table = 'user';

    protected $entity = User::class;

    protected function createEntity(array $row): ?EntityInterface
    {
        return (new User)
            ->setId($row['id'])
            ->setFullname($row['fullname'])
            ->setCreatedAt($row['created_at']);
    }

}
