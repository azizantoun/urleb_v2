<?php
$tags = get_meta_tags($row[original_link]);   
$sites_html = file_get_contents($row[original_link]);
$html = new DOMDocument();
@$html->loadHTML($sites_html);
$meta_og_img = null;
$meta_og_title = null;
//Get all meta tags and loop through them.
foreach($html->getElementsByTagName('meta') as $meta) {
    //If the property attribute of the meta tag is og:image
    if($meta->getAttribute('property')=='og:image'){ 
        //Assign the value from content attribute to $meta_og_img
        $meta_og_img = $meta->getAttribute('content');
    }
    if($meta->getAttribute('property')=='og:title'){ 
        //Assign the value from content attribute to $meta_og_title
        $meta_og_title = $meta->getAttribute('content');
    }
}

echo '<meta property="og:title" content="'.$meta_og_title.'" /> 
  <meta property="og:image" content="'.$meta_og_img.'" /> 
  <meta property="og:description" content="'. $tags['description'].'" /> 
  <meta property="og:url" content="'.$row[original_link].'">
';
?>
