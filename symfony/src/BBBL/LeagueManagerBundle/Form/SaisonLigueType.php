<?php

namespace BBBL\LeagueManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SaisonLigueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('saison')
            ->add('modeLigue')
            ->add('ordre')
            ->add('dateDeb')
            ->add('dateFin')
            ->add('actif')
            ->add('idligue')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BBBL\LeagueManagerBundle\Entity\SaisonLigue'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bbbl_leaguemanagerbundle_saisonligue';
    }
}
