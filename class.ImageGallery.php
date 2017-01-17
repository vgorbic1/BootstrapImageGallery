<?php
/**
 * The class is an utility that allows for reading image files 
 * from a given directory and displaying them along with their captions.
 * The script utilizes Bootstrap framework's Modals in order to display
 * the images properly. Some CSS tweaks (included in the package) are required.
 * @author Vladislav Gorbich
 * @version 0.1
 */
 
class ImageGallery {
	
	const IMAGE_PATH = "images/";
	const caption_FILE_NAME = "captions";
	private $galleryPath;
	private $images = array();
	
	/**
	 * Constructor to create an objects and a path to the directory.
	 */
	public function __construct($name) {
		$this->galleryPath =  $this::IMAGE_PATH . $name;
	}
	
	/**
	 * Method to create an associative array for the images.
	 * If no captions are available, create an array of empty spaces.
	 */
	private function combineNamesAndCaptions() {
		// Get all file names and put them into an array
		$imageNames = array_diff(scandir($this->galleryPath), array('.', '..', $this::caption_FILE_NAME));
		
		// Get all captions and put them into an array
		if (file_exists($this->galleryPath . '/' . $this::caption_FILE_NAME)) {
			$pathToCaptionsFile = $this->galleryPath . '/' . $this::caption_FILE_NAME;	
			$fh = fopen($pathToCaptionsFile, 'r');
			$imageCaptions = fgetcsv($fh, 0, "\t");
			fclose($fh);
		} else {
		// If captions file is not found replace each caption with a space
			$imageCaptions =  array_fill(0, sizeOf($imageNames), ' ');
		}

		// If numner of images and captions are not the same replace each caption with a space	
		if (sizeOf($imageNames) != sizeOf($imageCaptions)) {
			$imageCaptions =  array_fill(0, sizeOf($imageNames), ' ');
		}
		
		// Combine names and captions in one array.	
		return $this->images = array_combine($imageNames, $imageCaptions);
	}
	
	/**
	 * Method to display the images and their captions.
	 */
	public function showAll() {
		
		// Create an associative array of images and captions
		$this->combineNamesAndCaptions();
		
		// Display images
		foreach ($this->images as $name => $caption) {
			echo '<button type="button" class="imageGallery" data-toggle="modal" data-target="#modal-'
			  . str_replace('.', '', $name) . '"><img class="imageGalleryThumb" src="' . $this->galleryPath 
			  . '/' . $name . '" /></button>';
			echo '<div id="modal-' . str_replace('.', '', $name) . '" . class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">' . $caption . '</h4>
						</div>
						<div class="modal-body">
							<img src="' . $this->galleryPath . '/' . $name . '" alt="' . $caption .'" />
						</div>
					</div>
				</div>
			  </div>';
		}		
	}
	
	// To Do: Write a method to upload images and write their captions.
}
?>