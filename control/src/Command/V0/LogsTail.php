<?php

namespace Addshore\Mwdd\Command\V0;

use Addshore\Mwdd\DockerCompose\Commands;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogsTail extends Command
{

	protected static $defaultName = 'v0:logs-tail';

	protected function configure()
	{
		$this->addArgument('log' );
		$this->ignoreValidationErrors();
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$log = $input->getArgument('log');
		(new Commands())->exec( 'web', "tail -f /var/log/mediawiki/${log}");
	}
}
