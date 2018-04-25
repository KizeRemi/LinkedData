<?php 
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
            ->add('doi', TextType::class, ['label' => 'Ajouter un DOI'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }
}