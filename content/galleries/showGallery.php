<?php
    function FlickrGallery($RssFeedUrl)
    {
        try {
            $xmlfile= $RssFeedUrl;
            $xml = simplexml_load_file(rawurlencode($xmlfile));
            $namespaces = $xml->getNamespaces(true);

            $count = 0;

            // The Image Gallery
            echo '<div class="galleryWrapper">';
                echo '<ul class="bxslider">';
                    foreach ($xml->channel->item as $item) {
                        echo '<li><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" class="w520"/>';
                        echo '<a href="' . $item->children($namespaces['media'])->content->attributes()->url . '" class="swipebox" title="' . $item->title . '">
                                <div class="bx-zoom">
                                    <img src="images/galleryZoom.png" alt="Zoom">
                                </div>
                              </a>';
                        echo '</li>';
                        echo $item->title;
                    }
                echo '</ul>';


                echo '<div id="bx-pager">';
                    foreach ($xml->channel->item as $item) {
                        echo '<a data-slide-index="' . $count . '" href="" class="bxThumb"><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" /></a>';

                        $count++;
                    }
                echo '</div>';
            echo '</div>';
        }
        catch (Exception $e)
        {
            echo 'Beim laden der Bilder ist ein Fehler aufgetreten. <br><br><hr><br>';
            echo $e;
        }
    }

    function ArticleGallery($ArticleId)
    {
        try {
            // Count the Images in the specific Folder
            $files = scandir('images/articles/galleries/' . $ArticleId);
            $count = count($files)-2;

            $i = 0;

            // The Image Gallery
            echo '<div class="galleryWrapper">';
                echo '<ul class="bxslider">';
                    while($i < $count) {
                        echo '<li><img src="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg" class="w520"/>';
                        echo '<a href="' . $item->children($namespaces['media'])->content->attributes()->url . '" class="swipebox" title="' . $item->title . '">
                                <div class="bx-zoom">
                                    <img src="images/galleryZoom.png" alt="Zoom">
                                </div>
                              </a>';
                        echo '</li>';
                        echo $item->title;
                    }
                echo '</ul>';


                echo '<div id="bx-pager">';
                    foreach ($xml->channel->item as $item) {
                        echo '<a data-slide-index="' . $count . '" href="" class="bxThumb"><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" /></a>';

                        $count++;
                    }
                echo '</div>';
            echo '</div>';
        }

        catch (Exception $e)
        {
            echo 'Beim laden der Bilder ist ein Fehler aufgetreten. <br><br><hr><br>';
            echo $e;

            return "Fehler";
        }
    }
?>
