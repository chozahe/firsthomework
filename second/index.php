<?php
declare(strict_types=1);
require_once 'FileProcessor.php';

$fileProcessor = new FileProcessor("dataset");

echo $fileProcessor->minimal();

