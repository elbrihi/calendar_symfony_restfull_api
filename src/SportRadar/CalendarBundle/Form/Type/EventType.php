<?php
namespace SportRadar\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;



class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
        ->add('date',TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control',
                )
            )
        )
        ->add('city',TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control',
                )
            )
        )
        ->add('sport')
        ;
    
       
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'SportRadar\CalendarBundle\Entity\Event',
            'csrf_protection' => false
        ]);
    }
}