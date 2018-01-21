<?php
/**
 * Created by PhpStorm.
 * User: alber
 * Date: 20/01/2018
 * Time: 03:53
 */

namespace Clin\Repositories;


interface RepositoryMultitenancyInterface
{
    public function applyMultitenancy();
}