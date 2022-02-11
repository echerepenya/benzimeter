<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    private $targetDirectory;
    private $slugger;
    private $imageOptimizer;

    public function __construct($targetDirectory, SluggerInterface $slugger, ImageOptimizer $imageOptimizer)
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
        $this->imageOptimizer = $imageOptimizer;
    }

    public function upload(UploadedFile $file)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            'Ошибка сохранения файла  '. $e;
        }

        $this->imageOptimizer->resize($this->getTargetDirectory() .'/'. $fileName);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}