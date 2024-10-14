<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $createUser = [
        'name' => [
            'label' => 'Nombres',
            'rules' => 'required|min_length[2]|max_length[255]',
            'errors' => [
                'required' => 'El campo {field} es obligatorio',
                'min_length' => 'El campo {field} debe tener al menos 2 caracteres',
                'max_length' => 'El campo {field} no puede exceder los 255 caracteres',
            ]
        ],
        'lastname' => 'required',
        'username' => 'required',
        'password' => 'required',
        'birthdate' => 'required',
    ];
}
