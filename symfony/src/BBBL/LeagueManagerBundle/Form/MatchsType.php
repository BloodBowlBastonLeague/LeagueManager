<?php

namespace BBBL\LeagueManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatchsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urltopic')
            ->add('journee')
            ->add('datematch')
            ->add('score1')
            ->add('score2')
            ->add('possession1')
            ->add('occupationOwn1')
            ->add('occupationTheir1')
            ->add('subSonne1')
            ->add('subKo1')
            ->add('subBlesse1')
            ->add('subMort1')
            ->add('possession2')
            ->add('occupationOwn2')
            ->add('occupationTheir2')
            ->add('subSonne2')
            ->add('subKo2')
            ->add('subBlesse2')
            ->add('subMort2')
            ->add('note')
            ->add('spectateur')
            ->add('poule')
            ->add('modifGloire1')
            ->add('modifGloire2')
            ->add('malusGloire')
            ->add('idmatch2')
            ->add('idmatch1')
            ->add('idteam2')
            ->add('idsaisonLigue')
            ->add('idteam1')
            ->add('idplayer')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BBBL\LeagueManagerBundle\Entity\Matchs'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bbbl_leaguemanagerbundle_matchs';
    }
}
