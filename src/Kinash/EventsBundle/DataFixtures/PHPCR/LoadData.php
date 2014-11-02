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

        $menuRoot = $dm->find(null, '/cms/simple');
       /* $homeMenuNode = new MenuNode('events');
        $homeMenuNode->setLabel('Events');
        $homeMenuNode->setParent($menuRoot);
        //$homeMenuNode->setContent(null);

        $dm->persist($homeMenuNode);*/

        $this->dm = $dm;
        Fixtures::load(__DIR__.'/fixtures.yml', $dm, array('providers' => array($this)));

        /*
        // add menu item for login
        $loginMenuNode = new MenuNode('login');
        $loginMenuNode->setLabel('Admin Login');
        $loginMenuNode->setParent($menuRoot);
        $loginMenuNode->setRoute('login');

        $dm->persist($loginMenuNode);



        $logout = new MenuNode('logout');
        $logout->setLabel('Logout');
        $logout->setParent($menuRoot);
        $logout->setRoute('logout');

        $dm->persist($logout);

*/


        // tweak homepage
       /* $page = $this->dm->find(null, '/cms/simple/events');
        $page->setBody('Hello');
        $page->setDefault('_template', 'EventsBundle::home.html.twig');
*/
        $page = $this->dm->find(null, '/cms/simple');
        $page->setBody('Hello');
        $page->setDefault('_template', 'EventsBundle::home.html.twig');


        // add menu item for home
        $menuRoot =   $this->dm->find(null, '/cms/simple');
        $homeMenuNode = new MenuNode('home');
        $homeMenuNode->setLabel('Home');
        $homeMenuNode->setParent($menuRoot);
        $homeMenuNode->setContent($page);

        $this->dm->persist($homeMenuNode);

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

        $this->dm->persist($loginMenuNode);


        $logoutMenuNode = new MenuNode('logout');
        $logoutMenuNode->setLabel('Logout');
        $logoutMenuNode->setParent($menuRoot);
        $logoutMenuNode->setRoute('_events_logout');

        $this->dm->persist($logoutMenuNode);



        // load the blocks
        //    NodeHelper::createPath($manager->getPhpcrSession(), '/cms/content/blocks');
        //    Fixtures::load(array(__DIR__.'/../../Resources/data/blocks.yml'), $manager);

        // save the changes
        $this->dm->flush();



    }

    public function eventsParent()
    {
        return $this->dm->find(null, '/cms/simple');
    }

    public function urlGenerate($text)
    {
        $lowered = mb_strtolower($text);
        $path = preg_replace('/[^\da-z]/i', '_', $lowered);
        return trim($path, '_');
    }

    public function endTimeGenerate($startTime)
    {
        $hours = (int)substr($startTime, 0, 2)+rand(1, 2);
        return $hours.":00";
    }

}