<?php declare(strict_types=1);

namespace App\Component\Product\Command;

use App\Component\Product\Business\ProductImport;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'import:product')]
final class ProductImportCommand extends Command
{
    public function __construct(
        private readonly ProductImport $productImport,
    )
    {
        parent::__construct(null);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->productImport->import();

        return Command::SUCCESS;
    }

}
