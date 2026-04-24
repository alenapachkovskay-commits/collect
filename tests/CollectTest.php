<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    // ==================== ТЕСТЫ ДЛЯ МЕТОДА only() ====================

    public function testOnlyWithSeparateArguments()
    {
        $collect = new Collect(['name' => 'John', 'age' => 25, 'city' => 'Moscow']);
        $result = $collect->only('name', 'city');

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals(['name' => 'John', 'city' => 'Moscow'], $result->toArray());
    }

    public function testOnlyWithArrayArgument()
    {
        $collect = new Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $result = $collect->only(['a', 'c']);

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals(['a' => 1, 'c' => 3], $result->toArray());
    }

    public function testOnlyWithNonExistentKeys()
    {
        $collect = new Collect(['x' => 1, 'y' => 2]);
        $result = $collect->only('x', 'z');

        $this->assertEquals(['x' => 1], $result->toArray());
    }

    // ==================== ТЕСТЫ ДЛЯ МЕТОДА first() ====================

    public function testFirstWithNumericArray()
    {
        $collect = new Collect([10, 20, 30]);
        $result = $collect->first();

        $this->assertSame(10, $result);
    }

    public function testFirstWithAssociativeArray()
    {
        $collect = new Collect(['name' => 'Alice', 'age' => 30]);
        $result = $collect->first();

        $this->assertSame('Alice', $result);
    }

    // ==================== ТЕСТЫ ДЛЯ МЕТОДА count() ====================

    public function testCountWithNonEmptyArray()
    {
        $collect = new Collect([13, 17]);
        $this->assertSame(2, $collect->count());
    }

    public function testCountWithEmptyArray()
    {
        $collect = new Collect([]);
        $this->assertSame(0, $collect->count());
    }

    public function testCountWithAssociativeArray()
    {
        $collect = new Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(3, $collect->count());
    }

    // ==================== ТЕСТЫ ДЛЯ МЕТОДА toArray() ====================

    public function testToArrayWithNumericArray()
    {
        $collect = new Collect([1, 2, 3]);
        $result = $collect->toArray();

        $this->assertSame([1, 2, 3], $result);
        $this->assertIsArray($result);
    }

    public function testToArrayWithAssociativeArray()
    {
        $collect = new Collect(['x' => 10, 'y' => 20]);
        $result = $collect->toArray();

        $this->assertSame(['x' => 10, 'y' => 20], $result);
        $this->assertIsArray($result);
    }

    public function testToArrayWithEmptyArray()
    {
        $collect = new Collect([]);
        $result = $collect->toArray();

        $this->assertSame([], $result);
    }
}
