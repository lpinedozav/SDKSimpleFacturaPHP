<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use const INF;
use const NAN;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\TestFixture\Book;
use PHPUnit\TestFixture\ObjectEquals\ValueObject;
use stdClass;

#[CoversClass(Assert::class)]
#[TestDox('assertThat()')]
#[Small]
final class assertThatTest extends TestCase
{
    #[DoesNotPerformAssertions]
    public function testAssertThatAnything(): void
    {
        $this->assertThat('anything', $this->anything());
    }

    public function testAssertThatIsTrue(): void
    {
        $this->assertThat(true, $this->isTrue());
    }

    public function testAssertThatIsFalse(): void
    {
        $this->assertThat(false, $this->isFalse());
    }

    public function testAssertThatIsJson(): void
    {
        $this->assertThat('{}', $this->isJson());
    }

    #[DoesNotPerformAssertions]
    public function testAssertThatAnythingAndAnything(): void
    {
        $this->assertThat(
            'anything',
            $this->logicalAnd(
                $this->anything(),
                $this->anything(),
            ),
        );
    }

    #[DoesNotPerformAssertions]
    public function testAssertThatAnythingOrAnything(): void
    {
        $this->assertThat(
            'anything',
            $this->logicalOr(
                $this->anything(),
                $this->anything(),
            ),
        );
    }

    #[DoesNotPerformAssertions]
    public function testAssertThatAnythingXorNotAnything(): void
    {
        $this->assertThat(
            'anything',
            $this->logicalXor(
                $this->anything(),
                $this->logicalNot($this->anything()),
            ),
        );
    }

    public function testAssertThatContainsEqual(): void
    {
        $this->assertThat(['foo'], $this->containsEqual('foo'));
    }

    public function testAssertThatContainsIdentical(): void
    {
        $this->assertThat(['foo'], $this->containsIdentical('foo'));
    }

    public function testAssertThatStringMatchesFormatDescription(): void
    {
        $this->assertThat('foo', $this->matches('%s'));
    }

    public function testAssertThatStringContains(): void
    {
        $this->assertThat('barfoobar', $this->stringContains('foo'));
    }

    public function testAssertThatStringStartsWith(): void
    {
        $this->assertThat('foobar', $this->stringStartsWith('foo'));
    }

    public function testAssertThatStringEndsWith(): void
    {
        $this->assertThat('foobar', $this->stringEndsWith('bar'));
    }

    public function testAssertThatStringEqualsStringIgnoringLineEndings(): void
    {
        $this->assertThat('foo' . "\r\n", $this->stringEqualsStringIgnoringLineEndings('foo' . "\n"));
    }

    public function testAssertThatContainsOnly(): void
    {
        $this->assertThat(['foo'], $this->containsOnly('string'));
    }

    public function testAssertThatContainsOnlyInstancesOf(): void
    {
        $this->assertThat([new Book], $this->containsOnlyInstancesOf(Book::class));
    }

    public function testAssertThatArrayHasKey(): void
    {
        $this->assertThat(['foo' => 'bar'], $this->arrayHasKey('foo'));
    }

    public function testAssertThatArrayIsList(): void
    {
        $this->assertThat([0, 1, 2], $this->isList());
    }

    public function testAssertThatEqualTo(): void
    {
        $this->assertThat('foo', $this->equalTo('foo'));
    }

    public function testAssertThatEqualToCanonicalizing(): void
    {
        $this->assertThat(['foo', 'bar'], $this->equalToCanonicalizing(['bar', 'foo']));
    }

    public function testAssertThatEqualToIgnoringCase(): void
    {
        $this->assertThat('foo', $this->equalToIgnoringCase('FOO'));
    }

    public function testAssertThatEqualToWithDelta(): void
    {
        $this->assertThat(1.0, $this->equalToWithDelta(1.09, 0.1));
    }

    public function testAssertThatIdenticalTo(): void
    {
        $value      = new stdClass;
        $constraint = $this->identicalTo($value);

        $this->assertThat($value, $constraint);
    }

    public function testAssertThatIsInstanceOf(): void
    {
        $this->assertThat(new stdClass, $this->isInstanceOf(stdClass::class));
    }

    public function testAssertThatIsType(): void
    {
        $this->assertThat('string', $this->isType('string'));
    }

    public function testAssertThatIsEmpty(): void
    {
        $this->assertThat([], $this->isEmpty());
    }

    public function testAssertThatFileIsReadable(): void
    {
        $this->assertThat(__FILE__, $this->isReadable());
    }

    public function testAssertThatFileIsWritable(): void
    {
        $this->assertThat(__FILE__, $this->isWritable());
    }

    public function testAssertThatDirectoryExists(): void
    {
        $this->assertThat(__DIR__, $this->directoryExists());
    }

    public function testAssertThatFileExists(): void
    {
        $this->assertThat(__FILE__, $this->fileExists());
    }

    public function testAssertThatGreaterThan(): void
    {
        $this->assertThat(2, $this->greaterThan(1));
    }

    public function testAssertThatGreaterThanOrEqual(): void
    {
        $this->assertThat(2, $this->greaterThanOrEqual(1));
    }

    public function testAssertThatLessThan(): void
    {
        $this->assertThat(1, $this->lessThan(2));
    }

    public function testAssertThatLessThanOrEqual(): void
    {
        $this->assertThat(1, $this->lessThanOrEqual(2));
    }

    public function testAssertThatMatchesRegularExpression(): void
    {
        $this->assertThat('foobar', $this->matchesRegularExpression('/foo/'));
    }

    public function testAssertThatCallback(): void
    {
        $this->assertThat(
            null,
            $this->callback(static fn ($other) => true),
        );
    }

    public function testAssertThatCountOf(): void
    {
        $this->assertThat([1], $this->countOf(1));
    }

    public function testAssertThatNull(): void
    {
        $this->assertThat(null, $this->isNull());
    }

    public function testAssertThatIsFinite(): void
    {
        $this->assertThat(0, $this->isFinite());
    }

    public function testAssertThatIsInfinite(): void
    {
        $this->assertThat(INF, $this->isInfinite());
    }

    public function testAssertThatIsNan(): void
    {
        $this->assertThat(NAN, $this->isNan());
    }

    public function testAssertThatObjectEquals(): void
    {
        $this->assertObjectEquals(new ValueObject(1), new ValueObject(1));
    }
}