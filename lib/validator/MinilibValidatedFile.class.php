<?php

/**
 * MinilibValidatedFile represents a validated uploaded file.
 *
 * @author     Cristian Radulescu
 */
class MinilibValidatedFile extends sfValidatedFile
{
  /**
   * Saves the uploaded file. Also created tuhmbnail
   *
   * This method can throw exceptions if there is a problem when saving the file.
   *
   * If you don't pass a file name, it will be generated by the generateFilename method.
   * This will only work if you have passed a path when initializing this instance.
   *
   * @param  string $file      The file path to save the file
   * @param  int    $fileMode  The octal mode to use for the new file
   * @param  bool   $create    Indicates that we should make the directory before moving the file
   * @param  int    $dirMode   The octal mode to use when creating the directory
   *
   * @return string The filename without the $this->path prefix
   *
   * @throws Exception
   */
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {
    $uploaded_file = parent::save($file, $fileMode, $create, $dirMode);

    // create thumbnail
    MinilibImage::getInstance($uploaded_file)->createThumbnailFromFile(substr($this->getExtension(), 1));

    return $uploaded_file;
  }
}
