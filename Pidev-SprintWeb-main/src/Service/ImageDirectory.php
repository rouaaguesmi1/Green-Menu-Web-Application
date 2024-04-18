<?php
namespace App\Service;

class ImageDirectory
{
    private string $directory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public function getDirectory(): string
    {
        return $this->directory;
    }
}
