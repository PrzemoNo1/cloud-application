<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require("../Components/Preconditions/send_preconditions.php");

final class send_preconditionsTest extends TestCase
{
    public function testCheckReturnFalseWhenEmailIsNotProvidedInSession(): void
    {
        unset($_SESSION['mail_address']);
        $sut = new Send_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnFalseWhenEmailIsProvidedAndRssListIsUnset(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        unset($_SESSION['rss_list']);
        $sut = new Send_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnFalseWhenEmailIsProvidedAndRssListIsEmpty(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $_SESSION['rss_list'] = [];
        $sut = new Send_preconditions();
        $this->assertFalse($sut->check());
    }

    public function testCheckReturnTrueWhenRssListIsNotEmpty(): void
    {
        $_SESSION['mail_address'] = "example@example.com";
        $_SESSION['rss_list'] = ["example.com" => "false"];
        $sut = new Send_preconditions();
        $this->assertTrue($sut->check());
    }
}