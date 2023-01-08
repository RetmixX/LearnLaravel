<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:ddd {domain} {--f=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "The command that creates the folder structure\n
    --f=title - Add another folder\n
    Example --f=Test1 --f=Test2 --f=Test3";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $domain = $this->argument('domain');
        $options = $this->options();

        if (!$this->createStructureFolder($domain, $options)){
            $this->error("Houston, we're in trouble! FOLDERS ARE NOT CREATED!");
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function createStructureFolder($domain, $options):bool{
        $mainFolder = './src/Domain/'.$domain;
        $structure = [
            '/Action',
            '/Model',
            '/DTO',
            '/Exception',
            '/ViewModel',
        ];

        $structure = array_merge($structure, $this->processingOptions($options['f']));

        if (!is_dir($mainFolder))
            if (!mkdir($mainFolder))
                return false;

        foreach ($structure as $item){
            if (!is_dir($mainFolder.$item))
                if (!mkdir($mainFolder.$item))
                    return false;
        }


        return true;
    }

    private function processingOptions(array $options):array{
        $newArray = [];
        if (empty($options))
            return [];

        foreach ($options as $item){
            $newArray[] = '/'.$item;
        }

        return $newArray;
    }
}
