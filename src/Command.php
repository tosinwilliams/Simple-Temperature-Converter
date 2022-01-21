<?php 
namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;


class Command extends SymfonyCommand
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function convert(InputInterface $input, OutputInterface $output)
    {
        $output->write("Welcome to the converter");

        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion('Please select a converter',['C', 'F'],0);

        $temp = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected: '.$temp);

        if ($temp === 'C') {
            $question = new Question('Please enter the celsius value: ', 0);
            $celsius = $helper->ask($input, $output, $question);
            $fahrenheit = $this->celsius_to_fahrenheit($celsius);
            $output->write("\n{$celsius}°C is {$fahrenheit}°F");
        } elseif ($temp === 'F') {
            $question = new Question('Please enter the fahrenheit value: ', 0);
            $fahrenheit = $helper->ask($input, $output, $question);
            $celsius = $this->fahrenheit_to_celsius($fahrenheit);
            $output->write("\n$fahrenheit}°F is {$celsius}°C");
        }
        $output->writeln("\n\nThanks for using the converter");
    }

    protected function fahrenheit_to_celsius($value)
    {
        $celsius = 5/9 * ($value - 32); 
        return $celsius;
    }

    protected function celsius_to_fahrenheit($value)
    {
        $fahrenheit = 9/5 * ($value) + 32;
        return $fahrenheit;
    }
}