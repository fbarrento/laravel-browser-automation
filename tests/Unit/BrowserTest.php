<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class BrowserTest extends TestCase
{

    public function testTestsAreWorking()
    {


        $serverUrl = 'http://localhost:4444/wd/hub';

        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--no-sandbox',
            '--window-size=1920,1080'
        ]);

        $driver = RemoteWebDriver::create(
            $serverUrl,
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY_W3C, $options
            )
        );
        $driver->get('https://www.google.com');
        $driver->takeScreenshot('screenshot.png');
        $driver->quit();

        $this->assertTrue(true);
    }

}
