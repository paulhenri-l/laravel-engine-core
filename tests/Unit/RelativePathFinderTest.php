<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Unit;

use PaulhenriL\LaravelEngineCore\RelativePathFinder;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class RelativePathFinderTest extends TestCase
{
    public function test_relative_path_from_directory_a_to_directory_b_can_be_found()
    {
        $directoryA = '/users/paulhenri-l/sites/my-great-project/public/vendor/some-engine';
        $directoryB = '/users/paulhenri-l/sites/my-great-project/vendor/some-vendor/some-engine/public';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('../../../vendor/some-vendor/some-engine/public', $relativePath);
    }

    public function test_relative_path_with_trailing_slash()
    {
        $directoryA = '/users/paulhenri-l/sites/my-great-project/public/vendor/some-engine';
        $directoryB = '/users/paulhenri-l/sites/my-great-project/vendor/some-vendor/some-engine/public/';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('../../../vendor/some-vendor/some-engine/public', $relativePath);
    }

    public function test_relative_path_near_root()
    {
        $directoryA = '/users';
        $directoryB = '/etc';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('../etc', $relativePath);
    }

    public function test_relative_path_with_almost_same_directory_name()
    {
        $directoryA = '/users/';
        $directoryB = '/users_data/';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('../users_data', $relativePath);
    }

    public function test_relative_path_when_going_forward()
    {
        $directoryA = '/users';
        $directoryB = '/users/hello';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('./hello', $relativePath);
    }


    public function test_relative_path_when_going_forward_and_trailing_slash()
    {
        $directoryA = '/users/';
        $directoryB = '/users/hello';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('./hello', $relativePath);
    }

    public function test_relative_path_when_directory_are_the_same()
    {
        $directoryA = '/dir_a';
        $directoryB = '/dir_a';

        $relativePath = RelativePathFinder::findRelativePath($directoryA, $directoryB);

        $this->assertEquals('.', $relativePath);
    }

    public function test_doesnt_work_with_absolute_paths()
    {
        $this->expectException(\Exception::class);

        RelativePathFinder::findRelativePath(
            'not_relative',
            'not_relative'
        );
    }
}
