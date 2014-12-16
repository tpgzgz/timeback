<?php
namespace Application\Models;

use Core\Entity\HydrateInterface;

class EntityUser implements HydrateInterface
{
    private $id;
    protected $lastname;
    protected $name;
    private $password;
    protected $email;
    public $description;
    public $gender;
    public $city;
    public $pets;
    public $languages;
    public $photo;

    public function setId($id) {
        $this->id = $id;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setPets($pets) {
        $this->pets = $pets;
    }

    public function setLanguages($languages) {
        $this->languages = $languages;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function hydrate($data)
    {
        $this->setId($data['iduser']);
        $this->setName($data['name']);
        $this->setLastname($data['lastname']) ;
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setDescription($data['description']);
        $this->setPhoto($data['photo']);
        $this->setGender($data['genders_idgender']);
        $this->setCity($data['cities_idcity']);
        $this->setPets($data['pets']);
        $this->setLanguages($data['languages']);
    }

    public function extract()
    {
        $user = array(
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'description' => $this->description,
            'photo' => $this->photo,
            'gender' => $this->gender,
            'city' => $this->city,
            'pets' => $this->pets,
            'languages' => $this->languages
        );
        return $user;
    }
}