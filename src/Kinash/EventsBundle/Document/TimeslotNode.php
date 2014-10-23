<?php

namespace Kinash\EventsBundle\Document;

use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
* @PHPCR\Document(referenceable=true)
*/
class TimeslotNode implements RouteReferrersReadInterface
{
    /**
     * @PHPCR\Id()
     */
    protected $id;

    /**
     * @PHPCR\ParentDocument()
     * @var Workshop
     */
    protected $parent;

    /**
     * @PHPCR\Date()
     */
    protected $time;

    /**
     * @PHPCR\String(nullable=true)
     * @var string
     */
    protected $room;

    /**
     * @PHPCR\Int()
     * @var integer
     */
    protected $totalPlaces;

    /**
     * @PHPCR\Referrers(
     *     referringDocument="Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route",
     *     referencedBy="content"
     * )
     */
    protected $routes;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Workshop
     */
    public function getParentDocument()
    {
        return $this->parent;
    }

    public function setParentDocument(WorkshopNode $parent)
    {
        $this->parent = $parent;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

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
     * @return integer
     */
    public function getTotalPlaces()
    {
        return $this->totalPlaces;
    }

    /**
     * @param integer $totalPlaces
     */
    public function setTotalPlaces($totalPlaces)
    {
        $this->totalPlaces = $totalPlaces;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}
