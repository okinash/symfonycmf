<?php

namespace Kinash\EventsBundle\Document;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
* @PHPCR\Document(referenceable=true)
*/
class TimeSlot extends Page
{
    /**
     * @PHPCR\String()
     * @var string
     */
    private $room;

    /**
     * @PHPCR\Int()
     * @var integer
     */
    private $totalPlaces;


    /**
     * @PHPCR\String()
     * @var integer
     */
    private $startTime;

    /**
     * @PHPCR\String()
     * @var integer
     */
    private $endTime;


    /**
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param string $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param string $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }


    /**
     * @return int
     */
    public function getTotalPlaces()
    {
        return $this->totalPlaces;
    }

    /**
     * @param int $totalPlaces
     */
    public function setTotalPlaces($totalPlaces)
    {
        $this->totalPlaces = $totalPlaces;
    }

    /**
     * @return WorkshopPage
     */
    public function getWorkshop()
    {
        return $this->getParentDocument();
    }

    /**
     * @param WorkshopPage $event
     */
    public function setWorkshop(WorkshopPage $event)
    {
        $this->setParentDocument($event);
    }
}
