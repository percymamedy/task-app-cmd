<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
    /**
     * Configure the Command.
     *
     * @return void
     */
    public function configure()
    {
        $this->setName('complete')
             ->setDescription('Complete a task.')
             ->addArgument('id', InputArgument::REQUIRED);
    }

    /**
     * Fires the Command.
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query(
            'delete from tasks where id = :id', 
            compact('id')
        );

        $output->writeln('<info>Task Completed!</info>');

        $this->showTasks($output);
    }
}
