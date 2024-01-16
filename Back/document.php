<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class UserDocument
{
    /** @MongoDB\Id(strategy="UUID") */
    private $id;

    /** @MongoDB\Field(type="string") */
    private $nom;

    /** @MongoDB\Field(type="string") */
    private $prenom;

    /** @MongoDB\Field(type="string") */
    private $photo_pro;

    /** @MongoDB\Field(type="string") */
    private $photo_fun;

    /** @MongoDB\Field(type="string") */
    private $nom_prenom;

}