<?php

namespace Kinash\EventsBundle\Document;

use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;


/**
* @PHPCR\Document(referenceable=true)
*/
class WorkShopPage extends Page
{
    /**
     * @return EventPage
     */
    public function getEvent()
    {
        return $this->getParentDocument();
    }

    /**
     * @param EventPage $event
     */
    public function setEvent(EventPage $event)
    {
        $this->setParentDocument($event);
    }
}
