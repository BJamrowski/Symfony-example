<?php


namespace App\Form;


use App\Entity\Car;
use App\Entity\Salary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalaryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('sellDate')
            ->add('paymentMethods',ChoiceType::class,
                [
                    'choices' => [
                        'Cash' => 'cash',
                        'Card' => 'card',
                    ],
                    'expanded' => true
                ])
 //           ->add('username')
            ->add('phoneNumber')
            ->add('salesDocNumber')
            ->add('name')
            ->add('surname')
//            ->add('dataSalesDoc', [
//                'empty_data' => '27.07.2021',
//                'mapped' => false
//            ])
 //           ->add('price')
            ->add('submit',SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salary::class,
        ]);
    }
}