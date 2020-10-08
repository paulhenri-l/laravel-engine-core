<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\InstallTasks\SymlinkAssets;
use PaulhenriL\LaravelEngineCore\RelativePathFinder;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class SymlinkAssetsTaskTest extends TestCase
{
    public function test_assets_are_symlinked()
    {
        $this->loadInstallTask(SymlinkAssets::class);

        $target = public_path('vendor/FakeEngine');

        $symlinkedDir = RelativePathFinder::findRelativePath(
            public_path('/vendor'),
            $engineAssets = realpath(__DIR__ . '/../../FakeEngine/public')
        );

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . SymlinkAssets::class . ']')
            ->expectsOutput("Symlinked Directory [{$symlinkedDir}] To [/public/vendor/FakeEngine]")
            ->expectsOutput('Symlinking complete.');

        $targetRoot = explode('/', $target);
        array_pop($targetRoot);
        $targetRoot = implode('/', $targetRoot);

        $followedSymlink = realpath($targetRoot . '/' . readlink($target));
        $this->assertTrue(is_link($target));
        $this->assertEquals($engineAssets, $followedSymlink);
    }
}
