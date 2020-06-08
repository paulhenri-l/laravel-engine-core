<?php

namespace PaulhenriL\LaravelEngineCore\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use PaulhenriL\LaravelEngineCore\Console\IndentedOutput;
use PaulhenriL\LaravelEngineCore\Console\InstallTasks\InstallTaskInterface;
use PaulhenriL\LaravelEngineCore\EngineServiceProvider;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
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
        foreach ($this->installTasks as $installTask) {
            $this->runInstallTask(
                $this->getLaravel()->make($installTask)
            );

            $this->line('');
        }

        $this->indentOutput(0);
        $this->info($this->engine->getEngineName() . ' installed 🎉');
    }

    /**
     * Run the given InstallTask.
     */
    protected function runInstallTask(InstallTaskInterface $installTask): void
    {
        $this->indentOutput(0);
        $this->output->writeln('[' . get_class($installTask) . ']');

        $output = $this->indentOutput(2);
        $installTask->run($this);

        if (!$output->hasBeenWritten()) {
            $this->info(class_basename($installTask) .' Complete.');
        }
    }

    /**
     * Return an instance of the engine
     */
    public function getEngine(): EngineServiceProvider
    {
        return $this->engine;
    }

    /**
     * Switch to indented output.
     */
    protected function indentOutput(int $indent = 4): IndentedOutput
    {
        if (!$this->originalOutput) {
            $this->originalOutput = $this->output;
        }

        $this->output = new IndentedOutput($this->originalOutput, $indent);

        return $this->output;
    }
}
