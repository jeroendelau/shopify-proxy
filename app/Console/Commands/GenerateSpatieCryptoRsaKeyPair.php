<?php

namespace App\Console\Commands;

use Spatie\Crypto\Rsa\KeyPair;
use Illuminate\Console\Command;

class GenerateSpatieCryptoRsaKeyPair extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spatie-keypair:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a "spatie/crypto" private/public key pairs';

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
        (new KeyPair())->generate(storage_path('SpatieCryptoRsa.private'),storage_path('SpatieCryptoRsa.public'));
        $this->info('Key pair generated!');
        return parent::SUCCESS;
    }
}
