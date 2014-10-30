<?php

namespace Acme\DemoBundle\DataFixtures\PHPCR;

use Doctrine\ODM\PHPCR\DocumentManager;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;

/**
 * Loads the initial demo data of the demo website.
 */
class LoadDemoData implements FixtureInterface
{
    /**
     * Load data fixtures with the passed DocumentManager
     *
     * @param DocumentManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // tweak homepage
        $page = $manager->find(null, '/cms/simple');
        $page->setBody('Hello');
        $page->setDefault('_template', 'EventsBundle::home.html.twig');

        // add menu item for home
        $menuRoot = $manager->find(null, '/cms/simple');
        $homeMenuNode = new MenuNode('home');
        $homeMenuNode->setLabel('Home');
        $homeMenuNode->setParent($menuRoot);
        $homeMenuNode->setContent($page);

        $manager->persist($homeMenuNode);

      /*  $homeMenuNode = new MenuNode('events');
        $homeMenuNode->setLabel('Events');
        $homeMenuNode->setParent($menuRoot);
        $homeMenuNode->setContent($page);
       // $homeMenuNode->setRoute('/');*/

        //$manager->persist($homeMenuNode);

        // load the pages
       // Fixtures::load(array(__DIR__.'/../../Resources/data/pages.yml'), $manager);

        // add menu item for login
        $loginMenuNode = new MenuNode('login');
        $loginMenuNode->setLabel('Admin Login');
        $loginMenuNode->setParent($menuRoot);
        $loginMenuNode->setRoute('_events_login');

        $manager->persist($loginMenuNode);


        $logoutMenuNode = new MenuNode('logout');
        $logoutMenuNode->setLabel('Logout');
        $logoutMenuNode->setParent($menuRoot);
        $logoutMenuNode->setRoute('_events_logout');

        $manager->persist($logoutMenuNode);



        // load the blocks
    //    NodeHelper::createPath($manager->getPhpcrSession(), '/cms/content/blocks');
    //    Fixtures::load(array(__DIR__.'/../../Resources/data/blocks.yml'), $manager);

        // save the changes
        $manager->flush();
    }
}
