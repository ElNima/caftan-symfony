<?php

namespace CAFTAN\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class ImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
            
    {
        //$builder->add('file', FileType::class,['attr'=>['data-img'=>$builder->getData()->getWebPath()]])
         $builder->add('file', FileType::class)
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
        
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CAFTAN\AppBundle\Entity\Image'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'caftan_appbundle_image';
    }


}
