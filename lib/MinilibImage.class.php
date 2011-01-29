<?php

/**
 * Description of bookImage
 *
 * @author Cristian Radulescu
 */
class MinilibImage
{
  /**
   *
   * @var MinilibImage
   */
  static private $instance = null;

  /**
   *
   * @var string
   */
  private $image_file_name;

  /**
   *
   * @var string
   */
  private $thumbnail_file_name;

  /**
   * "not available" image file name
   */
  const NOT_AVAILABLE = 'not_available.png';

  /**
   * Initialize paths
   *
   * @param string $img_name
   *
   * @return void
   */
  private function __construct($img_name)
  {
    $this->image_file_name = $this->isFileValid($img_name) ? $img_name : self::NOT_AVAILABLE;
    $this->thumbnail_file_name = $this->isFileValid($img_name, true) ? $img_name : self::NOT_AVAILABLE;
  }

  /**
   * Create path template in "printf-like" format
   *
   * @param string $is_thumbnail
   * 
   * @return string
   */
  private function getRelativePath($is_thumbnail = false)
  {
    $path = $is_thumbnail ? sfConfig::get('app_thumbnails_relative_path', '') : sfConfig::get('app_images_relative_path', '');

    return $path.'%s';
  }

  /**
   * Get full image path
   *
   * @param string $filename
   *
   * @return string
   */
  private function getFullPath($filename, $is_thumbnail = false)
  {
    $relative_path = sprintf($this->getRelativePath($is_thumbnail), $filename);
    return sfConfig::get('sf_web_dir').$relative_path;
  }

  /**
   * Retrieve singleton instance
   *
   * @param string $img_name
   *
   * @return MinilibImage
   */
  static public function getInstance($img_name)
  {
    if (!isset(self::$instance[$img_name]))
    {
      self::$instance[$img_name] = new self($img_name);
    }

    return self::$instance[$img_name];
  }

  /**
   * Check wether provided file exists and if is writeable
   *
   * @param string $filename
   *
   * @throws Exception
   *
   * @return void
   */
  private function isFileValid($filename, $is_thumbnail = false)
  {
    if (!is_file($this->getFullPath($filename, $is_thumbnail)))
    {
      return false;
    }

    if (!is_writable($this->getFullPath($filename, $is_thumbnail)))
    {
      return false;
    }

    return true;
  }

  /**
   * Retrieve relative path for image
   *
   * @return string
   */
  public function getImageSrc()
  {
    return sprintf($this->getRelativePath(), $this->image_file_name);
  }

  /**
   * Retrieve relative path for thumbnail
   *
   * @return string
   */
  public function getThumbnailSrc()
  {
    return sprintf($this->getRelativePath(true), $this->thumbnail_file_name);
  }

  /**
   * Render relative path for image
   *
   * @return string
   */
  public function renderImageSrc()
  {
    printf($this->getRelativePath(), $this->image_file_name);
  }

  /**
   * Render relative path for thumbnail
   *
   * @return string
   */
  public function renderThumbnailSrc()
  {
    printf($this->getRelativePath(true), $this->thumbnail_file_name);
  }

  /**
   * Getter for image file name
   *
   * @return string
   */
  public function getImageFileName()
  {
    return $this->image_file_name;
  }

  /**
   * Getter for thumbail file name
   *
   * @return string
   */
  public function getThumbnailFileName()
  {
    return $this->thumbnail_file_name;
  }

  public function createThumbnailFromFile($ext = 'png')
  {
    $create_function = ($ext == 'jpg') ? 'imagecreatefromjpeg' : 'imagecreatefrom'.$ext;
    $save_function = ($ext == 'jpg') ? 'imagejpeg': 'image'.$ext;
    try
    {
      // sizes
      list($width, $height) = getimagesize($this->getFullPath($this->image_file_name));
      $new_width = 98;
      $new_height = 150;

      // load
      $thumb = imagecreatetruecolor($new_width, $new_height);

      $ext = ($ext == 'jpg') ? 'jpeg' : $ext;

      $source = call_user_func($create_function, $this->getFullPath($this->image_file_name));

      // resize
      imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

      call_user_func_array($save_function, array($thumb, sfConfig::get('app_thumbnails_path', '').$this->image_file_name));
      $this->thumbnail_file_name = $this->image_file_name;

      // chmod file
      chmod($this->getFullPath($this->thumbnail_file_name, true), 0777);
    }
    catch (Exception $exc)
    {
      throw $exc;
    }
  }
}
