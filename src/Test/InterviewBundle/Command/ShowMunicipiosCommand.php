<?php
namespace Test\InterviewBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowMunicipiosCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('test:show:comunidad')
            ->setDescription('Show municipios for a province.')
            ->setHelp('This command allows you see a list of municipios of a province.')
            ->addArgument('nombreDeProvincia', InputArgument::REQUIRED, 'The name of the province.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $municipiosService = $this->getContainer()->get('municipios');
        $municipios = $municipiosService->getAllByNombreDeProvincia($input->getArgument('nombreDeProvincia'));

        $output->writeln([
            'Provincia: ' . $input->getArgument('nombreDeProvincia'),
            '=================',
            '',
        ]);

        foreach ($municipios as $municipio) {
            //
            $output->writeln($municipio['nombre']);
        }

        $output->write('');
    }
}