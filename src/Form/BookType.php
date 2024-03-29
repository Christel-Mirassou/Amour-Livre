<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\User;
use App\Entity\Genre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('synopsis', TextareaType::class, [
                'label' => 'Synopsis'
            ])
            ->add('thumbnail', HiddenType::class)
            ->add('language', TextType::class, [
                'label' => 'Langue'
            ])
            ->add('isbn', TextType::class, [
                 'label_attr' => ['class' => 'isbn-label']
            ] )
            ->add('publication_date', TextType::class, [
                'mapped' => false
            ])
            ->add('publisher', TextType::class, [
                'label' => 'Éditeur'
            ])
            ->add('author', TextType::class, [
                'label' => 'Auteur'
            ])
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name',
                'help' => 'Veuillez sélectionner le genre qui correspond !'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
