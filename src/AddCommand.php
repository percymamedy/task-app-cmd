<?php

namespace App;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class AddCommand extends Command
{
    /**
     * Configure the Command.
     *
     * @return void
     */
    public function configure()
    {
        $this->setName('add')
             ->setDescription('Adds a new task.')
             ->addArgument('description', InputArgument::REQUIRED);
    }

    /**
     * Fires the Command.
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->database->query(
            'insert into tasks(description) values(:description)',
            compact('description')
        );

        $output->writeln('<info>Task Added!</info>');

        $this->showTasks($output);
    }
}
