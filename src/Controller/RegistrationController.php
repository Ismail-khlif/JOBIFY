<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Formation;
use App\Entity\Post;
use App\Entity\Users;
use App\Form\UsersType;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Response;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends AbstractController
{


    #[Route('/register', name: 'app_register')]
     function new(Request $request):Response
    {

        $user = new Users();

        $form = $this->createForm(UsersType::class, $user);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
      /*  $evenement = new Evenement();
        $Formation = new Formation();
        $post = new Post();*/

        if ($form->isSubmitted()  ) {

            /*$evenement->setTitre('NULL');
            $user->setEvenement($evenement);
            // encode the plain password
            $Formation->setTitre('NULL');
            $user->setFormation($Formation);
            $post->setTitre('NULL');
            $user->setPost($post);
            // Save*/

            $em = $this->getDoctrine()->getManager();
           /* $em->persist($evenement);
            $em->persist($Formation);
            $em->persist($post);*/
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('AfficheP');
        }

        return $this->render('registration/index.html.twig', ['form' => $form->createView()]);
    }
    #[Route('/AfficheP', name: 'AfficheP')]
    public function AfficheProfil(UsersRepository $repository){
        //$repo =$this->getDoctrine()->getRepository(Classroom::class);
        $Profil=$repository->findAll();
        return $this->render('registration/AfficheProfil.html.twig',['Profil'=>$Profil]);
    }

    }