<?php

namespace PaulhenriL\LaravelEngineCore\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use PaulhenriL\LaravelEngineCore\Console\IndentedOutput;
use PaulhenriL\LaravelEngineCore\Console\InstallTasks\InstallTaskInterface;
use PaulhenriL\LaravelEngineCore\EngineServiceProvider;
use PaulhenriL\LaravelTaskRunner\CanRunTasks;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    use CanRunTasks;

    /**
     * The engine's service provider instance.
     *
     * @var EngineServiceProvider
     */
    protected $engine;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description;

    /**
     * The installation tasks.
     *
     * @var array
     */
    protected $installTasks;

    /**
     * The original OutputInterface instance.
     *
     * @var OutputInterface|null
     */
    protected $originalOutput;

    /**
     * Create a new command instance.
     */
    public function __construct(EngineServiceProvider $engine, array $tasks) {
        $this->engine = $engine;

        $engineName = $engine->getEngineName();
        $this->signature = Str::kebab($engineName) . ':install';
        $this->description = 'Install ' . $engineName . ' in your application';
        $this->installTasks = $tasks;

        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->runTasks($this->installTasks, $this);

        $this->line('');
        $this->indentOutput(0);
        $this->info($this->engine->getEngineName() . ' installed 🎉');
    }

    /**
     * Return an instance of the engine
     */
    public function getEngine(): EngineServiceProvider
    {
        return $this->engine;
    }
}
