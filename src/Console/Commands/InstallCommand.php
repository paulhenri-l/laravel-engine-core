<?php

namespace PaulhenriL\LaravelEngine\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use PaulhenriL\LaravelEngine\Console\IndentedOutput;
use PaulhenriL\LaravelEngine\Console\InstallTasks\InstallTaskInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    /**
     * The engine's service provider class.
     *
     * @var string
     */
    protected $engineServiceProviderClass;

    /**
     * The engine's name.
     *
     * @var string
     */
    protected $engineName;

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
    public function __construct(
        string $engineServiceProviderClass,
        string $engineName,
        array $installTasks
    ) {
        $this->engineServiceProviderClass = $engineServiceProviderClass;
        $this->engineName = $engineName;
        $this->signature = Str::kebab($engineName) . ':install';
        $this->description = 'Install ' . $engineName . ' in your application';
        $this->installTasks = $installTasks;

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
        $this->info($this->engineName . ' installed 🎉');
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
     * The engine's service provider class.
     */
    public function getEngineServiceProviderClass(): string
    {
        return $this->engineServiceProviderClass;
    }

    /**
     * Return the engine's name.
     */
    public function getEngineName(): string
    {
        return $this->engineName;
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
