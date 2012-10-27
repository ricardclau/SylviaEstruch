<?php

namespace SEstruch\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SEstruch\WebsiteBundle\Entity\Pintura;

class PinturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('file1')
            ->add('mini_alignment', 'choice', array(
                'choices' => Pintura::getPhotoAlignments()
            ))
            ->add('file2')
            ->add('file3')
            ->add('file4')
            ->add('file5')
            ->add('file6')
            ->add('category')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SEstruch\WebsiteBundle\Entity\Pintura'
        ));
    }

    public function getName()
    {
        return 'sestruch_websitebundle_pinturatype';
    }
}
