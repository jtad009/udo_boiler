<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\Folder;
use Cake\Network\Exception;

/**
 * Upload component
 */
class UploadComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    public $components = ['Manipulator'];
    protected $_defaultConfig = [];
    public $max_files = 3;
    protected $dir = SHOUT_IMAGE_UPLOAD_PATH;
     protected $logo = 'logos/';    

    /**
     * Upload multiple images at once
     * @param type $data the payload
     * @return string| null
     */
    public function uploadMultiple($data) {
        $filename = [];
        for ($i = 0; $i < count($data); $i++):
            if (!empty($data[$i]['name'])) :
                
                $filename[] = $this->upload($data[$i]);
            endif;
        endfor;
        return $filename;
    }

    /**
     * Upload Video or Mp3 Or Photo to server
     * @todo Imporve to work with jquery or angular js and also check file type
     * @param file $data path to file
     * @return string
     * @throws InternalErrorException
     */
    public function send($data, $type) {
        if (!empty($data['name'])) {
             $this->Manipulator->setImageFile($data['tmp_name']);
             $filename = APP_NAME.'-'.substr(\Cake\Utility\Text::Uuid(),0,5).$this->getExtension($data['name']);
            switch ($type) {
                case 'barcode':
                    
                    $this->dir = SHOUT_IMAGE_UPLOAD_PATH.'/barcode/';
                   
                    $this->Manipulator->resample(662, 60);
                    //$this->Manipulator->crop();
                    $this->Manipulator->save($this->dir.DS.$filename);
                    break;
                case 'document':
                     $this->dir = SHOUT_IMAGE_UPLOAD_PATH.'/documents/';
                   
                    $this->Manipulator->resample(640, 480);
                    //$this->Manipulator->crop();
                    $this->Manipulator->save($this->dir.DS.$filename);
                    break;
                case 'logo':
                     $this->dir = SHOUT_IMAGE_UPLOAD_PATH.'/logos/';
                   
                    $this->Manipulator->resample(200, 200);
                    //$this->Manipulator->crop();
                    $this->Manipulator->save($this->dir.DS.$filename);
                    return $filename;

            }
           // new Folder($this->dir, true); //create folder for upload if it doesnt exist
            return $filename;
        }
    }
    
    /**
     * Upload Image data to the server
     * @param type $data
     * @return string
     * @throws InternalErrorException
     */
    private function upload($data) {
        $allowed = array('png', 'jpg', 'jpeg');
        if (!in_array(substr(strrchr($data['name'], '.'), 1), $allowed)):
            throw new InternalErrorException("Error Processing Request", 1);
        elseif (is_uploaded_file($data['tmp_name'])) :
            $filename = \Cake\Utility\Text::Uuid() . '-' . $data['name'];
            //echo $filename;
            move_uploaded_file($data['tmp_name'], $this->dir . DS . $filename);
        endif;
        return $filename;
    }

    public function uploadExcel($data){
        $allowed = array('xlsx');
        
        if (!in_array(substr(strrchr($data['name'], '.'), 1), $allowed)):
            throw new InternalErrorException("Error Processing Request.Invalid File format", 1);
        elseif (is_uploaded_file($data['tmp_name'])) :
            $filename = \Cake\Utility\Text::Uuid() . '-' . $data['name'];
            //echo $filename;
            move_uploaded_file($data['tmp_name'], WWW_ROOT .'excel/uploads/' . $filename);
        endif;
        return  WWW_ROOT .'excel/uploads/'.$filename;
    }
    private function getExtension($image){
        $temp = explode(".", $image);
        // Get extension.
        return '.'.end($temp);
  
    }
    /**
     * Get csv file and upload
     * @param $data data to parse
     * @return null|array array of csv lines on success or Null
     * @throws InternalErrorException
     */
    public function csvUpload($data){
        $filename = null;
        $message = null;

        if (!empty($data['name'])) {
            $filename= $data['name'];
            $file_tmp_name = $data['tmp_name'];
            $dir = WWW_ROOT . 'excel' . DS . 'uploads';
            $allowed = array('csv');
            if (!in_array(substr(strrchr($filename, '.'), 1), $allowed)) {
                throw new InternalErrorException("Error Processing Request", 1);
            } else if (is_uploaded_file($file_tmp_name)) {
                $filename = Text::Uuid().'-'.$filename;
                move_uploaded_file($file_tmp_name, $dir . DS . $filename);

            }

            $this->file = $dir.DS.$filename;


        }
        return $this->parseFile();
    }

    /**
     * @return false|null|string
     */
    private function parseFile(){
        $contents = array();
        $file_handle = fopen($this->file,'r');
        while(!feof($file_handle)){
            $contents[] = fgetcsv($file_handle);
        }
        fclose($file_handle);
        //unlink($this->file);
        return  $contents;

    }
    //function convert price to image
     public function convertPriceToImage($text,$barcode,$itemname){
            $my_img = imagecreate(140, 50 );
            $background = imagecolorallocate( $my_img, 255, 255, 255 );
            $text_colour = imagecolorallocate( $my_img, 0, 0, 0);
            $line_colour = imagecolorallocate( $my_img, 0, 0, 0 );
            imagestring( $my_img, 4, 30, 25, 'N'.number_format($text), $text_colour );
            //imagestring( $my_img, 4, 30, 0, 'udo.com.ng', $text_colour );
            imagesetthickness ( $my_img, 5 );
            imageline( $my_img, 30, 45, 165, 45, $line_colour );

            
            imagejpeg( $my_img, SHOUT_IMAGE_UPLOAD_PATH."/barcode/price.jpg" );
            //echo $barcode;
            $this->createimageinstantly(SHOUT_IMAGE_UPLOAD_PATH."/barcode/price.jpg",$barcode);
            imagecolordeallocate($my_img, $line_colour );
            imagecolordeallocate($my_img, $text_colour );
            imagecolordeallocate( $my_img,$background );
            imagedestroy( $my_img );
            header( "Content-type: application/json" );
           }
           /**
           *Function to combine two images together
           */
     public function createimageinstantly($img1='',$img2='',$img3=''){
        $x=$y=100;
        //header('Content-Type: image/png');
        $this->dir = SHOUT_IMAGE_UPLOAD_PATH.'/barcode/';
        

        $outputImage = imagecreatetruecolor(180, 200);
        // set background to white
        $white = imagecolorallocate($outputImage, 255, 255, 255);
        imagefill($outputImage, 0, 0, $white);

        $first = imagecreatefromjpeg($img1);
        $second = imagecreatefromjpeg($img2.'.jpg');
        //$third = imagecreatefromjpeg($img3);

        //imagecopyresized ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
        imagecopyresized($outputImage,$first,0,0,0,0, $x, $y,$x,$y);
        //imagecopyresized($outputImage,$second,0,0,0,0, $x, $y,$x,$y);
        imagecopyresized($outputImage,$second,0,50,0,0, 200, 200, 200, 200);
        // Add the text
        //imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
        // $text = 'School Name Here';
        // $font = 'OldeEnglish.ttf';
         //imagettftext($outputImage, 32, 0, 150, 450, $white,"","udo.com.ng");
        $filename =$img2.'.png';
        imagepng($outputImage, $filename);
//echo $filename =$targetPath .round(microtime(true)).'.png';
       //echo '<img src="'.$filename.'" alt="Image created by a PHP script" width="200" height="80">';
        imagedestroy($outputImage);
        unlink($img1);
        unlink($img2.'.jpg');
}
}
