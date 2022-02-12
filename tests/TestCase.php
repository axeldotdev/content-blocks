<?php

namespace Axeldotdev\ContentBlocks\Tests;

use Axeldotdev\ContentBlocks\ContentBlocksServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [ContentBlocksServiceProvider::class];
    }
}
