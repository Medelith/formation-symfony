<?php

namespace App\Form;

use App\DTO\AccountSearchCriteria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Formulaire de recherche des comptes
 */
class SearchAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $criteria = $options['empty_data'];

        $builder
            ->add('email', TextType::class, [
                'required' => false,
            ])
            ->add('limit', NumberType::class, [
                'required' => false,
                'empty_data' => (string)$criteria->limit,
            ])
            ->add('page', NumberType::class, [
                'required' => false,
                'empty_data' => (string)$criteria->page,
            ])
            ->add('orderBy', ChoiceType::class, [
                'required' => false,
                'empty_data' => $criteria->orderBy,
                'choices' => [
                    'id' => 'id',
                    'createdAt' => 'createdAt',
                    'updatedAt' => 'updatedAt',
                    'email' => 'email',
                ],
            ])
            ->add('direction', ChoiceType::class, [
                'required' => false,
                'empty_data' => $criteria->direction,
                'choices' => [
                    'asc' => 'ASC',
                    'desc' => 'DESC',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AccountSearchCriteria::class,
            'csrf_protection' => false,
            'method' => 'GET',
            'data' => new AccountSearchCriteria(),
            'empty_data' => new AccountSearchCriteria(),
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}