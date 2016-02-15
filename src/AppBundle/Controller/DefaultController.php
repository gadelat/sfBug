<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employer;
use AppBundle\Entity\EmployerContact;
use AppBundle\Form\EmployerForm;
use AppBundle\Form\EmployerFormManually;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $employer = $this->getEmployer($em);

        $form = $this->createForm(new EmployerForm(), $employer);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($employer);
            $em->flush();
        }

        // replace this example code with whatever you need
        return $this->render('index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @param EntityManager $em
     * @return Employer|null|object
     */
    private function getEmployer(EntityManager $em)
    {
        /** @var EntityRepository $employerRepository */
        $employerRepository = $em->getRepository('AppBundle:Employer');

        $employer = $employerRepository->findOneBy([]);

        if (!$employer) {
            $employer = new Employer();
            $em->persist($employer);
            $em->flush();
        }

        return $employer;
    }
}
