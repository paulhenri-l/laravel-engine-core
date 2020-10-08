<?php

namespace PaulhenriL\LaravelEngineCore\Console\InstallTasks;

use Illuminate\Filesystem\Filesystem;
use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;
use PaulhenriL\LaravelEngineCore\RelativePathFinder;

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
    public function __invoke(InstallCommand $command): void
    {
        $engineName = $command->getEngine()->getEngineName();
        $dest = public_path('vendor/' . $engineName);

        $relativeSource = RelativePathFinder::findRelativePath(
            public_path('vendor'),
            $command->getEngine()->assetsPath()
        );

        if (!$this->files->exists(public_path('vendor'))) {
            $this->files->makeDirectory(public_path('vendor'));
        }

        if (!$this->files->exists($dest)) {
            $this->files->link($relativeSource, $dest);
        }

        $output = '';
        $output .= '<info>Symlinked Directory</info> ';
        $output .= "<comment>[$relativeSource]</comment> ";
        $output .= "<info>To</info> ";
        $output .= "<comment>[/public/vendor/{$engineName}]</comment>";

        $command->getOutput()->writeln($output);
        $command->info('Symlinking complete.');
    }
}
