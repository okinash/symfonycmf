<?php

namespace Kinash\EventsBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;

class LoadData implements FixtureInterface
{
    /** @var  ObjectManager */
    private $dm;

    public function load(ObjectManager $dm)
    {
        // tweak homepage
//        $page = $dm->find(null, '/cms/events');
//        $page->setBody('Hello');
//        $page->setDefault('_template', 'Levi9CmsBundle::home.html.twig');

        // add menu item for home
        $menuRoot = $dm->find(null, '/cms');
        $homeMenuNode = new MenuNode('menu_events');
        $homeMenuNode->setLabel('Events');
        $homeMenuNode->setParent($menuRoot);
        $homeMenuNode->setContent(null);

        $dm->persist($homeMenuNode);

        $this->dm = $dm;
        $objects = Fixtures::load(__DIR__.'/fixtures.yml', $dm, array('providers' => array($this)));

        // add menu item for login
        $loginMenuNode = new MenuNode('login');
        $loginMenuNode->setLabel('Admin Login');
        $loginMenuNode->setParent($menuRoot);
        $loginMenuNode->setRoute('login');

        $dm->persist($loginMenuNode);
    }

    public function eventsParent()
    {
        return $this->dm->find(null, '/cms/events');
    }
}