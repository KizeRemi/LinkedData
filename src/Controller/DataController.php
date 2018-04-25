<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DataType;

class DataController extends Controller
{
    public function data(Request $request)
    {
        $form = $this->createForm(DataType::class);
        $form->handleRequest($request);
        $doi = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $doi = $form->getData()['doi'];
        }

        return $this->render('data/home.html.twig', [
            'form' => $form->createView(),
            'doi' => $doi,
        ]);
    }
}