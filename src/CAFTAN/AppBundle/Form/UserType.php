<?php

namespace CAFTAN\AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use CAFTAN\AppBundle\Form\AdressType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
                ->add('nom')
                ->add('prenom')
                ->add('createur', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class)
                ->add('tel')
                ->add('adress', AdressType::class)
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CAFTAN\AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'caftan_appbundle_user';
    }


}
