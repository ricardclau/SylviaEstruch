<?php

namespace SEstruch\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SEstruch\WebsiteBundle\Entity\EntityHelper;

class TeatroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('foto1')
            ->add('mini_alignment', 'choice', array(
                'choices' =>EntityHelper::getPhotoAlignments()
            ))
            ->add('foto2')
            ->add('foto3')
            ->add('category')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SEstruch\WebsiteBundle\Entity\Teatro'
        ));
    }

    public function getName()
    {
        return 'sestruch_websitebundle_teatrotype';
    }
}
