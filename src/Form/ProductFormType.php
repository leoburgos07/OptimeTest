<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [ 'label' => 'Código'] )
            ->add('name', TextType::class, [ 'label' => 'Nombre'] )
            ->add('description', TextareaType::class, [ 'label' => 'Descripción'] )
            ->add('brand', TextType::class, [ 'label' => 'Marca'] )
            ->add('price', IntegerType::class, [ 'label' => 'Precio'] )
            ->add('category', EntityType::class, ['class' => Category::class, 'choice_label' => 'name'])
            ->add('Submit', SubmitType::class, [ 'label' => 'Guardar'] );     
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
