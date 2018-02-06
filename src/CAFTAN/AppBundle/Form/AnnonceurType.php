<?php

namespace CAFTAN\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use CAFTAN\AppBundle\Form\UserType;


class AnnonceurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')->add('prix')->add('creation')->add('descr')->add('neuf')->add('signaled')->add('published')->add('createdAt')->add('image', \CAFTAN\AppBundle\Form\ImageType::class)->add('annonceur', UserType::class)->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
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
