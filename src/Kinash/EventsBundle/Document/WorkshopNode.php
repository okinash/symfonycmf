<?php

namespace Kinash\EventsBundle\Document;

use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
use Knp\Menu\NodeInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
* @PHPCR\Document(referenceable=true)
*/
class WorkshopNode implements RouteReferrersReadInterface
{
    /**
     * @PHPCR\Id()
     */
    protected $id;

    /**
     * @PHPCR\ParentDocument()
     * @var EventNode
     */
    protected $parent;

    /**
     * @PHPCR\Children()
     */
    protected $children;

    /**
     * @PHPCR\Nodename()
     */
    protected $title;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $description;

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
     * @return EventNode
     */
    public function getParentDocument()
    {
        return $this->parent;
    }

    public function setParentDocument(EventNode $parent)
    {
        $this->parent = $parent;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getParentTitle()
    {
        return $this->parent->getTitle();
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getName()
    {
        return $this->title;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getOptions()
    {
        return array(
            'label' => $this->title,
            'content' => $this,

            'attributes'         => array(),
            'childrenAttributes' => array(),
            'displayChildren'    => true,
            'linkAttributes'     => array(),
            'labelAttributes'    => array(),
        );
    }
}
