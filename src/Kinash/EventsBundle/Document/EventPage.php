<?php

namespace Kinash\EventsBundle\Document;

use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
* @PHPCR\Document(referenceable=true)
*/
class EventPage extends Page
{

}
