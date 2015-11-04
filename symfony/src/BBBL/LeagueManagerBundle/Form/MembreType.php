<?php

namespace BBBL\LeagueManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MembreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('email')
            ->add('pass')
            ->add('droits')
            ->add('hoverNav')
            ->add('hoverNavPlace')
            ->add('tresorerie')
            ->add('policeDefaut')
            ->add('actif')
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BBBL\LeagueManagerBundle\Entity\Membre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bbbl_leaguemanagerbundle_membre';
    }
}
