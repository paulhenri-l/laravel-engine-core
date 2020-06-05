<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngine\Console\InstallTasks\SymlinkAssets;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class SymlinkAssetsTaskTest extends TestCase
{
    public function test_assets_are_symlinked()
    {
        $this->loadInstallTask(SymlinkAssets::class);

        $assetsPath = realpath(__DIR__ . '/../../FakeEngine/public');
        $target = public_path('vendor/FakeEngine');

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . SymlinkAssets::class . ']')
            ->expectsOutput("  Symlinked Directory [/Users/paulhenri_l/Sites/PHP/laravel-engine/tests/FakeEngine/public] To [/public/vendor/FakeEngine]")
            ->expectsOutput('  Symlinking complete.');

        $this->assertTrue(is_link($target));
    }
}
