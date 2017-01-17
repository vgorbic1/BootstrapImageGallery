# BootstrapImageGallery
This package contains a utility that allows for creating a simple image gallery with captions based on 
Bootstrap's modals.

[Demo](http://imagegallery.vladislavgorbich.com/)

##Tasks:
Create a simple Image Gallery PHP script. The script should:
- Work with Bootstrap framework, preferably using modals.
- Be simple, fast, and scalable.
- Display image files from a specific directory.
- Display captions for each image.

##Delivirables:
- The class.imageGallery creates an object that represents an Image Gallery.
- The object has an array of all image names and corresponding captions.
- The captions are taken from a file in the same directory as the images. The captions are tab-delimited.
- The object has a method that allows for displaying all images within Bootstrap modals.
- If the captions file is missing or the number of captions does not correspond to the number of images, a 
space is used instead of a caption.
