<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class PrincipalController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager,AuthenticationUtils $authenticationUtils,Request $request): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setRoles(["ROLE_USER"]);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
        }

        return $this->render('header.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            'vista' => $form->createView()
        ]);
    }

}
