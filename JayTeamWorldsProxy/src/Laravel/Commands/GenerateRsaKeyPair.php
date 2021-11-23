<?php

namespace JayTeamWorlds\Proxy\Laravel\Commands;

use Exception;
use Illuminate\Console\Command;
use ParagonIE\Halite\KeyFactory;

class GenerateRsaKeyPair extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proxy-key:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a encryption key';

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
     * @return int
     */
    public function handle(): int
    {
        try {
            KeyFactory::save(KeyFactory::generateEncryptionKey(), config('jayteam-proxy.encryption_key'));
        }  catch (Exception $exception) {
            $this->info($exception->getMessage());
            return parent::FAILURE;
        }
        $this->info('Key pair generated!');
        return parent::SUCCESS;
    }
}
