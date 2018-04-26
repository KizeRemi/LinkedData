<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DataType;
use App\RdfHandler\Graph;

class DataController extends Controller
{
    public function data(Request $request, Graph $graph)
    {
        $form = $this->createForm(DataType::class);
        $form->handleRequest($request);
        $data = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $graph->getObject($form->getData()['doi']);
        }

        return $this->render('data/home.html.twig', [
            'form' => $form->createView(),
            'data' => $data,
        ]);
    }
}