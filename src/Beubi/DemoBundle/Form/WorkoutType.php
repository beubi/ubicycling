<?php

namespace Beubi\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkoutType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('distance')
            ->add('description', 'textarea', array('required' => false))
            ->add('timestamp', 'datetime')
            ->add('duration', 'text', array('required' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Beubi\DemoBundle\Entity\Workout'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'beubi_demobundle_workout';
    }
}
