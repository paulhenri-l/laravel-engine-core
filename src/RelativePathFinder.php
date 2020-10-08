<?php

namespace PaulhenriL\LaravelEngineCore;

use Illuminate\Support\Str;

class RelativePathFinder
{
    /**
     * Find the relative path to go from directoryA to directoryB.
     */
    public static function findRelativePath(string $directoryA, string $directoryB)
    {
        if (!Str::startsWith($directoryA, '/') || !Str::startsWith($directoryB, '/')) {
            throw new \Exception("[$directoryA] or [$directoryB] is not absolute");
        }

        if ($directoryA == $directoryB) {
            return '.';
        }

        $root = static::findSameRoot($directoryA, $directoryB);
        $dirAWithoutRoot = static::removeRoot($root, $directoryA);
        $dirBWithoutRoot = static::removeRoot($root, $directoryB);
        $dirAWithoutRootDeepness = static::findDeepness($dirAWithoutRoot);

        if ($dirAWithoutRootDeepness > 0) {
            $start = static::buildBackwardSegments($dirAWithoutRootDeepness);
        } else {
            $start = '.';
        }

        return $start . '/' . $dirBWithoutRoot;
    }

    /**
     * Find common root between the two directories.
     */
    protected static function findSameRoot(string $directoryA, string $directoryB): string
    {
        $root = '';
        $directoryASegments = explode('/', $directoryA);
        $directoryBSegments = explode('/', $directoryB);

        foreach ($directoryASegments as $k => $segment) {
            $dirBSegment = $directoryBSegments[$k] ?? null;

            if ($dirBSegment === $segment) {
                $root .= $segment . '/';
            } else {
                break;
            }
        }

        return $root;
    }

    /**
     * Remove the given root from the directories.
     */
    protected static function removeRoot(string $root, string $directory)
    {
        // Remove trailing "/"
        $root = substr($root, 0, -1);

        $dir = str_replace($root, '', $directory);

        return trim($dir, '/');
    }

    /**
     * Find how deep is the given directory structure.
     */
    protected static function findDeepness(string $directory): int
    {
        if (!$directory) {
            return 0;
        }

        return count(explode('/', $directory));
    }

    /**
     * Create n backward segments.
     */
    protected static function buildBackwardSegments(int $numberOfSegments)
    {
        $segments = '';

        for ($i = 0; $i < $numberOfSegments; $i++) {
            $segments .= '../';
        }

        return trim($segments, '/');
    }
}
