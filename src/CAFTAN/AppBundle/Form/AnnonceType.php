<?php

namespace CAFTAN\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('neuf')
                ->add('title')
                ->add('prix')
                ->add('creation')
                ->add('descr')
                ->add('signaled')
                ->add('published')
                ->add('createdAt')
//                ->add('annonceur', UserpType::class)
                ->add('annonceur', UserType::class)
                ->add('image', ImageType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CAFTAN\AppBundle\Entity\Annonce'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'caftan_appbundle_annonce';
    }


}
