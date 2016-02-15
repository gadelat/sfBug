<?php
namespace AppBundle\Form;

use AppBundle\Entity\Employer;
use AppBundle\Entity\EmployerContact;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class EmployerForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('testField', 'choice', [
            'choices' => [1,2],
            'expanded' => true,
            'choices_as_values' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'csrf_protection' => false,
                'method' => 'PATCH',
            ]
        );
    }

    public function getName()
    {
        return 'employer_edit';
    }
}
