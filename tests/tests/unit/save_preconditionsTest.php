<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require("../Components/Preconditions/save_preconditions.php");

final class save_preconditionsTest extends TestCase
{
    public function testCheckReturnFalseWhenEmailIsNotProvidedInSession(): void
    {
        $sut = new save_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnFalseWhenRssListIsEmptyAndThereIsNoUrlProvided(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $sut = new save_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnFalseWhenRssListIsNotEmptyAndNoCheckboxAreMarkedAndThereIsNoUrlProvided(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $_SESSION['rss_list'] = ["example.com" => "false"];
        $sut = new save_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnFalseWhenRssListIsNotEmptyAndNoCheckboxAreMarkedProvidedUrlIsNotCorrect(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $_SESSION['url'] = "notvalidurl.com";
        $sut = new save_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnTrueWhenRssListIsNotEmptyAndCheckboxIsMarked(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $_SESSION['rss_list'] = ["example.com" => "true"];
        $sut = new save_preconditions();
        $this->assertTrue($sut->check());
    }

    public function testCheckReturnTrueWhenRssListIsEmptyAndProvidedUrlIsCorrect(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $_SESSION['url'] = "https://www.tvn24.pl/najnowsze.xml";
        $sut = new save_preconditions();
        $this->assertTrue($sut->check());
    }
}