<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GeneratePlansCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('retromat:generate:plans')

            // the short description shown while running "php bin/console list"
            ->setDescription('Generate Plans.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to generate plans and store them in the database. At the moment, plan titles are filled with dummy values.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Generating plans and storing them in the database ...');

        $this->getContainer()->get('retromat.plan.plan_generator')->generateAll();

        $output->writeln('Generation complete.');
    }
}