<?php

namespace App;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{
    /**
     * Configure the Command.
     *
     * @return void
     */
    public function configure()
    {
        $this->setName('show')
             ->setDescription('Show all tasks.');
    }

    /**
     * Fires the Command.
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }
}
