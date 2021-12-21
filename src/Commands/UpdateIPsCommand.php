<?php

namespace SaeedVaziry\IP2Location\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use ZipArchive;

class UpdateIPsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ip2location:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update ip ranges table';

    /**
     * @var string
     */
    protected $dbPath = __DIR__.'/../../database/bin';

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
     * @throws Exception
     *
     * @return void
     */
    public function handle()
    {
        try {
            $file = $this->download();
            $this->extract($file);
            $this->cleanUp();
            $this->info('Finished');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @return false|string
     */
    protected function download()
    {
        $this->info('Downloading new ip tables...');

        $arrContextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ]
        ];

        return file_get_contents(
            config('ip2location.download_url'),
            false,
            stream_context_create($arrContextOptions)
        );
    }

    /**
     * @param $file
     */
    protected function extract($file)
    {
        $this->info('Extracting...');

        // delete old database
        if (file_exists($this->dbPath)) {
            File::deleteDirectory($this->dbPath);
        }

        // extract file
        mkdir($this->dbPath);
        file_put_contents($this->dbPath.'/db.zip', $file);
        $zip = new ZipArchive();
        if ($zip->open($this->dbPath.'/db.zip')) {
            $zip->extractTo($this->dbPath);
            $zip->close();
        }
    }

    /**
     * clean up.
     */
    protected function cleanUp()
    {
        // delete zip file
        if (file_exists($this->dbPath.'/db.zip')) {
            File::delete($this->dbPath.'/db.zip');
        }
    }
}
