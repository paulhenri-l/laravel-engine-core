<?php

namespace PaulhenriL\LaravelEngineCore\Console\InstallTasks;

use Illuminate\Filesystem\Filesystem;
use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;

class SymlinkAssets implements InstallTaskInterface
{
    /**
     * The Filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * SymlinkAssets constructor.
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    /**
     * Publish the engine's assets.
     */
    public function run(InstallCommand $command): void
    {
        $source = $command->getEngine()->assetsPath();
        $engineName = $command->getEngine()->getEngineName();
        $dest = public_path('vendor/' . $engineName);

        if (!$this->files->exists(public_path('vendor'))) {
            $this->files->makeDirectory(public_path('vendor'));
        }

        if (!$this->files->exists($dest)) {
            $this->files->link($source, $dest);
        }


        $output = '';
        $output .= '<info>Symlinked Directory</info> ';
        $output .= "<comment>[$source]</comment> ";
        $output .= "<info>To</info> ";
        $output .= "<comment>[/public/vendor/{$engineName}]</comment>";

        $command->getOutput()->writeln($output);
        $command->info('Symlinking complete.');
    }
}
