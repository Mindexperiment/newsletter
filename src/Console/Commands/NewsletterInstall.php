<?php

namespace Agpretto\Newsletter\Console\Commands;

use Illuminate\Console\Command;

class NewsletterInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:install
                            {--T|template : include publishing the template}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Agpretto Newsletter Package';

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
        if (app()->ennvironment('production')) {
            $this->alert('Running in production mode.');
            if ($this->confirm('Proceed installing Agpretto Newsletter?')) {
                return;
            }
        }

        $this->comment('Publishing Newsletter migrations...');
        $this->callSilent('vendor:publish', [ '--tag' => 'newsletter-migrations' ]);

        if ($this->option('template')) {
            $this->callSilent('vendor:publish', [ '--tag' => 'newsletter-views' ]);
        } else {
            $this->info('You can publish the Newsletter template so you can modify it.')

            if ($this->confirm('Publish Newsletter template?')) {
                $this->comment('Publishing Newsletter template..');
                $this->callSilent('vendor:publish', [ '--tag' => 'newsletter-views' ]);
            }
        }

        $this->info('Newsletter installed successfully.');
    }
}
