<?php
namespace Application\Models;

use Core\Entity\HydrateInterface;

class EntityTimeline implements HydrateInterface
{
    private $idTimeline;
    private $idTag;
    public $startDate;
    public $endDate;
    public $headline;
    public $text;
    public $media;
    public $mediaCredit;
    public $mediaCaption;
    public $mediaThumbnail;
    public $type;

    public function setIdTimeline($id) {
        $this->idTimeline = $id;
    }
    
    public function setIdTag($id) {
        $this->idTimeline = $id;
    }

    public function setStartDate($data) {
        $this->startDate = $data;
    }

    public function setEndDate($data) {
        $this->endDate = $data;
    }

    public function setHeadline($data) {
        $this->headline = $data;
    }

    public function setText($data) {
        $this->text = $data;
    }

    public function setMedia($data) {
        $this->media = $data;
    }

    public function setMediaCredit($data) {
        $this->mediaCredit = $data;
    }

    public function setMediaCaption($data) {
        $this->mediaCaption = $data;
    }

    public function setMediaThumbnail($data) {
        $this->mediaThumbnail = $data;
    }
    
    public function setType($data) {
        $this->type = $pets;
    }

    public function hydrate($data)
    {
        $this->setIdTimeline($data['idTimeline']);
        $this->setIdTag($data['idTag']);
        $this->setStartDate($data['startDate']) ;
        $this->setEndDate($data['endDate']);
        $this->setHeadline($data['headline']);
        $this->setText($data['text']);
        $this->setMedia($data['media']);
        $this->setMediaCredit($data['mediaCredit']);
        $this->setMediaCaption($data['mediaCaption']);
        $this->setType($data['type']);
    }

    public function extract()
    {
        $timeline = array(
            'idTimeline' => $this->id,
            'idTag' => $this->name,
            'startDate' => $this->lastname,
            'endDate' => $this->email,
            'headline' => $this->password,
            'text' => $this->description,
            'media' => $this->photo,
            'mediaCredit' => $this->gender,
            'mediaCaption' => $this->city,
            'type' => $this->pets
        );
        return $timeline;
    }
}