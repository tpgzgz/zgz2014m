<?php
$userForm = array(
    'name' =>array(
        'type'=>'text',
        'name'=>'name',
        'value'=>'',
        'label'=>'Nombre',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags','escape'),
        'validation'=>array('required', 'maxlength'=>8)
    ),
    'password'=>array(
        'type'=>'password',
        'name'=>'name',
        'label'=>'Password',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(),
        'validation'=>array()
    ),
    'pets'=>array(
        'type'=>'checkbox',
        'name'=>'pets',
        'options'=>array('cat'=>'Gato', 'dog'=>'Perro'),
        'value'=>array('cat'),
        'label'=>'Mascotas',
        'hint'=>'Selecciona tus mascotas',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(),
        'validation'=>array()
    ),
    
    
);
