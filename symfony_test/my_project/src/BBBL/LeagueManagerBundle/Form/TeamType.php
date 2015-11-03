<?php

namespace BBBL\LeagueManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeamType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('idroster')
            ->add('logo')
            ->add('url')
            ->add('idteamserver')
            ->add('prestige')
            ->add('apo')
            ->add('assistant')
            ->add('pompom')
            ->add('tresor')
            ->add('reroll')
            ->add('popularite')
            ->add('urlPhoto')
            ->add('proprio')
            ->add('domicile')
            ->add('couleurs')
            ->add('sponsors')
            ->add('gloire')
            ->add('dateModifGloire')
            ->add('background')
            ->add('cri')
            ->add('actif')
            ->add('idcoach')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BBBL\LeagueManagerBundle\Entity\Team'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bbbl_leaguemanagerbundle_team';
    }
}
