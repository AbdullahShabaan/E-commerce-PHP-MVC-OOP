<?php

namespace Tests;

use GUMP;
use Exception;

/**
 * Class GetErrorsArrayTest
 *
 * @package Tests
 */
class FilterTest extends BaseTestCase
{
    public function testGumpFilterIsSuccessfullyApplied()
    {
        $result = $this->gump->filter([
            'test' => 'text'
        ], [
            'test' => 'upper_case'
        ]);

        $this->assertEquals([
            'test' => 'TEXT'
        ], $result);
    }

    public function testMoreThanOneFiltersAreSuccessfullyApplied()
    {
        GUMP::add_filter("custom", function($value, $params = NULL) {
            return strtolower($value);
        });

        $result = $this->gump->filter([
            'test' => ' text '
        ], [
            'test' => 'trim|upper_case|custom'
        ]);

        $this->assertEquals([
            'test' => 'text'
        ], $result);
    }

    public function testPHPNativeFilterIsSuccessfullyApplied()
    {
        $result = $this->gump->filter([
            'test' => 'TEXT'
        ], [
            'test' => 'strtolower'
        ]);

        $this->assertEquals([
            'test' => 'text'
        ], $result);
    }

    public function testCustomFilterIsSuccessfullyApplied()
    {
        GUMP::add_filter("custom", function($value, $params = NULL) {
            return strtoupper($value);
        });

        $result = $this->gump->filter([
            'test' => 'text'
        ], [
            'test' => 'custom'
        ]);

        $this->assertEquals([
            'test' => 'TEXT'
        ], $result);
    }

    public function testCustomFilterWithParameters()
    {
        $this->markTestIncomplete('TODO');
        GUMP::add_filter("custom", function($value, $params = NULL) {
            return strtolower($value);
        });

        $result = $this->gump->filter([
            'test' => ' text '
        ], [
            'test' => 'trim|custom,hello,2'
        ]);

        $this->assertEquals([
            'test' => 'text'
        ], $result);
    }


    public function testNonexistentFilterThrowsException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Filter method 'custom' does not exist.");

        $this->gump->filter([
            'test' => 'text'
        ], [
            'test' => 'custom'
        ]);
    }

    public function testWhenApplyingFilterToUnknownFieldContinuesWithNextField()
    {
        $result = $this->gump->filter([
            'test' => 'text',
            'other' => 'text'
        ], [
            'non_existent' => 'upper_case',
            'other' => 'upper_case',
        ]);

        $this->assertEquals([
            'test' => 'text',
            'other' => 'TEXT'
        ], $result);
    }
}