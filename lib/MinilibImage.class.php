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
   * Initialize paths
   *
   * @param string $img_name
   *
   * @return void
   */
  private function __construct($img_name)
  {
    $this->image_file_name = sfConfig::get('app_images_path', '').$img_name.'.'.sfConfig::get('app_image_file_type', 'png');
    self::validateFile($this->image_file_name);

    $this->thumbnail_file_name = sfConfig::get('app_thumbnails_path', '').'thumb_'.$img_name.'.'.sfConfig::get('app_image_file_type', 'png');
    self::validateFile($this->thumbnail_file_name);
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
  static private function validateFile($filename)
  {
    if (!file_exists($filename))
    {
      throw new Exception('File '.$filename.' not found!');
    }

    if (!is_writable($filename))
    {
      throw new Exception('File '.$filename.' has incorrect permissions!');
    }
  }

  /**
   * Retrieve image in base64 format
   *
   * @return string
   */
  public function getBase64Image()
  {
    return $this->convertToBase64($this->image_file_name);
  }

  /**
   * Retrieve thumbnail in base64 format
   *
   * @return string
   */
  public function getBase64Thumbnail()
  {
    return $this->convertToBase64($this->thumbnail_file_name);
  }

  /**
   * Converts provided image file to base64 format
   *
   * @param string $file_name
   *
   * @return string
   */
  private function convertToBase64($file_name)
  {
    $fp = fopen($file_name, 'rb');
    $buffer = fread($fp, filesize($file_name));
    fclose ($fp);

    return base64_encode($buffer);
  }

  /**
   * Provides data URI for image
   *
   * @return void
   */
  public function getBase64ImageSrc()
  {
    echo self::createBase64DataUri($this->getBase64Image(), sfConfig::get('app_image_file_type', 'png'));
  }

  /**
   * Provides data URI for thumbnail
   * 
   * @return void
   */
  public function getBase64ThumbnailSrc()
  {
    echo self::createBase64DataUri($this->getBase64Thumbnail(), sfConfig::get('app_image_file_type', 'png'));
  }

  /**
   * Creates base64 data URI
   *
   * @param string $base64_image
   * @param strinf $data_type Defaults to 'png'
   *
   * @return string
   */
  static public function createBase64DataUri($base64_image, $data_type = 'png')
  {
    return 'data:image/'.$data_type.';base64,'.$base64_image;
  }

 }
