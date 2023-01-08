<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeDDDModel extends GeneratorCommand
{

    protected $signature = "make:modelDDD {name}";

    protected function getStub(){
        return base_path('stubs/model.ddd.stub');
    }

    protected function getDefaultNamespace($rootNamespace){
        return 'Domain/'.$rootNamespace.'/Model';
    }

    protected function replaceClass($stub, $name){
        $class = str_replace($this->getDefaultNamespace($name).'\\','',$name);
        return str_replace('{{domain}}', $name, $stub);
    }

}
