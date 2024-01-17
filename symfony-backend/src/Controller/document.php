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

    /* setters */
    public function setNom(string $data): void {$this->nom = $data;}
    public function setPrenom(string $data): void {$this->prenom = $data;}
    public function setPhotoPro(string $data): void {$this->photo_pro = $data;}
    public function setPhotoFun(string $data): void {$this->photo_fun = $data;}
    public function setNomPrenom(string $data): void {$this->nom_prenom = $data;}

    /* getters */
    
    public function getId(): string {return $this->id;}
    public function getNom(): string {return $this->nom;}
    public function getPrenom(): string {return $this->prenom;}
    public function getPhotoPro(): string {return $this->photo_pro;}
    public function getPhotofun(): string {return $this->photo_fun;}
    public function getNomPrenom(): string {return $this->nom_prenom;}
}