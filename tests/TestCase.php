<?php

namespace Tests;

use App\Support\Catalog;
use App\Support\Settings;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // The catalogue and settings are cached for the length of a request; each test starts clean.
        Catalog::flush();
        Settings::flush();
    }
}
