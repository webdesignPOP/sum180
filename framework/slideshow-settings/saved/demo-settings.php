<?php 
add_filter('slide_shows_saved', 'slide_shows_saved_slideshows');
function slide_shows_saved_slideshows ($d) {$d['slideshows'] = maybe_unserialize('a:1:{s:7:"default";a:14:{s:5:"label";s:17:"Default Slideshow";s:3:"key";s:7:"default";s:5:"width";s:3:"972";s:6:"height";s:3:"325";s:6:"timing";s:1:"6";s:10:"transition";s:4:"fade";s:5:"speed";s:0:"";s:14:"pause_on_hover";s:1:"0";s:7:"columns";s:1:"1";s:5:"index";s:7:"default";s:12:"ancestor_key";s:0:"";s:11:"version_key";s:20:"id_p01p87ktbxmck930g";s:10:"import_key";s:0:"";s:8:"slides_1";a:2:{s:12:"2w0q2892v0ow";a:12:{s:3:"key";s:12:"2w0q2892v0ow";s:5:"media";s:82:"wp-content/themes/parallelus-salutation/assets/images/slideshow/sample-slide-1.jpg";s:4:"link";s:0:"";s:12:"target_blank";s:1:"0";s:6:"format";s:5:"image";s:8:"position";s:4:"left";s:10:"transition";s:0:"";s:7:"content";s:0:"";s:5:"index";s:12:"2w0q2892v0ow";s:12:"ancestor_key";s:0:"";s:11:"version_key";s:20:"id_ldyws4kfzb7s7b98g";s:10:"import_key";s:0:"";}s:12:"7ijs7k2n5lkw";a:12:{s:3:"key";s:12:"7ijs7k2n5lkw";s:5:"media";s:82:"wp-content/themes/parallelus-salutation/assets/images/slideshow/sample-slide-2.jpg";s:4:"link";s:0:"";s:12:"target_blank";s:1:"0";s:6:"format";s:5:"image";s:8:"position";s:4:"left";s:10:"transition";s:0:"";s:7:"content";s:0:"";s:5:"index";s:12:"7ijs7k2n5lkw";s:12:"ancestor_key";s:0:"";s:11:"version_key";s:20:"id_eb7ed262ozxurhc9w";s:10:"import_key";s:0:"";}}}}', true); return $d; }
?>