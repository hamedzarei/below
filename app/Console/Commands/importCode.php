<?php

namespace App\Console\Commands;

use App\Code;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Console\Command;
use SimpleExcel\SimpleExcel;

class importCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:code {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import excel code file into db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = $this->argument('path');

        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($path);

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row_index=>$row) {
                if ($row_index == 1) continue;
                $cells = $row->getCells();
                $code = $cells[0]->getValue();
                $verification = $cells[1]->getValue();

                Code::createItem([
                    'code' => $code,
                    'verification' => $verification
                ]);
            }
        }

        echo "import successfully! \n";
    }
}
