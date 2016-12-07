

TVimageResizer plugin v1.9.4.5 for MODx 1.0.x

Andchir - http://modx-shopkeeper.ru

----------------------------------------------

Used EasyPhpThumbnail class by JF Nutbroek
http://www.mywebmymail.com/?q=content/easyphpthumbnail-class

Used Image util library 1.0.0 by Alexey Smallder
http://smallder.ru

----------------------------------------------

Install:

1. Place folder tvimageresizer to plug-ins folder assets/plugins/.

2. In the manager, open the "Elements" -> "Manage Elements" -> "Plugins" -> "New Plugin".

3. Plugin name:
   TVimageResizer
   
   Description:
   Plugin for creating miniature copy of pictures of Template Variables (TV - Image).
   
   Code plugin (php):
   require_once MODX_BASE_PATH.'assets/plugins/tvimageresizer/TVimageResizer.inc.php';
   
   Configure plugin:
   &tv_ids=TV IDs;string; &dirs=Thumb folders;string;small~medium &width=Width;string;200~400 &height=Height;string;100~200 &rcorner=Corners percentage of clipping;string; &backgroundColor=Background color;string;#FFFFFF &watermark=Watermark image path (png);string; &watermarkPos=Watermark position;string;90% 90% &cprighttext=Copyright text;string; &quality=Quality;int;90 &mirror=Mirror effect;list;yes,no;no &crop=Cropping;list;yes,no,crop_resized,fill_resized;no &save_o_name=Save only name;list;yes,no;no &rename_images=Rename images;list;yes,no;no &refresh_all_images=Refresh all images;list;yes,no;no
   
   System Events:
   OnBeforeDocFormSave
   
4. Create Template Variable with Input Type - Image. In the plugin configuration, specify its (their) ID.

----------------------------------------------

Configuration:

TV IDs - ID TV, which require the ability to change size (comma separated).
Thumb folders - folder, which will be upload a copy of the picture. You can specify a few through a separator "~" (without the quotes).
Width - the width of the copy of the picture. You can specify a few through a separator "~".
Height - the height of the copy of the picture. You can specify a few through a separator "~".
Cropping - crop images (create exactly to the sizes indicated);
Corners percentage of clipping - rounded corners (the size of the corner in percent);
Watermark image path (png) - watermark (the path to the PNG-image);
Copyright text - to put the text on the picture;
Save only name - remain in the field just the file name of the picture. Can be used to create images with link to the big picture;
Quality - the image quality (compression size). 
Background color - you understand (when rounding corners, etc.).
Rename images - All pictures will be renamed with the date: d.m.y_H.i.
Mirror effect - you understand :).
Refresh all images - update all the pictures when you click "Clear Cache" (recommended to put in only one at a time, because speed is quite low).

----------------------------------------------

Note:

If you want to create a small picture with link to the large, use the Save only name - yes.
Example:

<a href="assets/images/[*image*]" target="_blank"><img src="assets/images/small/[*image*]" width="100" height="100" alt="" /></a>

or PHx-modifier "replace":

[*image:replace=`small,big`*]

assets/images/small/image.jpg -> assets/images/big/image.jpg

