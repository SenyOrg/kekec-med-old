<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

/**
 * Class PatientForm
 * -----------------------------
 * 
 * -----------------------------
 * @package App\Forms
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class PatientForm extends Form
{
    protected $name = 'patients';

    public function buildForm()
    {
        $this->add('firstname', 'text')->add('lastname', 'text')
            ->add('gender', 'text')
            ->add('birthdate')
            ->add('insurance_type')
            ->add('insurance_id', 'entity', [
                'class' => 'App\Insurance',
                'property' => 'title',
                /*'query_builder' => function (App\Language $lang) {
                    // If query builder option is not provided, all data is fetched
                    return $lang->where('active', 1);
                }*/
            ])->add('save', 'submit', ['label' => 'Save form'])
            ->add('clear', 'reset', ['label' => 'Clear form']);

    }
}
