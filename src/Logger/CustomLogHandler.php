<?php declare(strict_types=1);

namespace WebGrip\ExampleModule\Logger;

class CustomHandler extends \Monolog\Handler\AbstractProcessingHandler
{
    protected function write(array $record): void
    {

    }
}
