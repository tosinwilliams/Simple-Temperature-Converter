<?php
namespace Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class TemperatureConverter extends Command
{
    
    public function configure()
    {
        $this -> setName('convert')
        -> setDescription('Temperature Converter');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->convert($input, $output);
        return 0;
    }
}