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


                echo '<div id="bx-pager" class="mobileHidden">';
                    foreach ($xml->channel->item as $item) {
                        echo '<a data-slide-index="' . $count . '" href="" class="bxThumb"><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" /></a>';

                        $count++;
                    }
                echo '</div>';
            echo '</div>';
            echo '<p class="desktopHidden">&nbsp;</div>';
        }
        catch (Exception $e)
        {
            echo 'Beim laden der Bilder ist ein Fehler aufgetreten. <br><br><hr><br>';
            echo $e;
        }
    }

    // Method for Galleries displayed in an Article
    function ArticleGallery($ArticleId)
    {
        try {
            // Count the Images in the specific Folder
            if (is_dir('images/articles/galleries/' . $ArticleId) || file_exists('images/articles/galleries/' . $ArticleId))
            {
                $files = scandir('images/articles/galleries/' . $ArticleId);
                $count = count($files)-2;

                $i = 1;

                // The Image Gallery
                $start = '<div class="galleryWrapper"><ul class="bxslider">';

                while($i <= $count) {
                    if ($i == 1)
                    {
                        $gallery ='<li><img src="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg" class="w520"/><a href="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg" class="swipebox" title="Anno 2205"><div class="bx-zoom"><img src="images/galleryZoom.png" alt="Zoom"></div></a></li>';

                    } else $gallery = $gallery . '<li><img src="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg" class="w520"/><a href="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg" class="swipebox" title="Anno 2205"><div class="bx-zoom"><img src="images/galleryZoom.png" alt="Zoom"></div></a></li>';

                    $i++;
                }

                $i = 1;
                $middle = '</ul><div id="bx-pager" class="mobileHidden">';

                while($i <= $count) {
                    if ($i == 1)
                    {
                        $pager = '<a data-slide-index="' . ($i-1) . '" href="" class="bxThumb"><img src="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg"  /></a>';
                    } else $pager = $pager . '<a data-slide-index="' . ($i-1) . '" href="" class="bxThumb"><img src="images/articles/galleries/' . $ArticleId . '/' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg"  /></a>';

                    $i++;
                }

                $end = '</div></div>';

                $result = $start . $gallery . $middle . $pager . $end;
                return $result;
            }
        }

        catch (Exception $e)
        {
            echo 'Beim laden der Bilder ist ein Fehler aufgetreten. <br><br><hr><br>';
            echo $e;

            return "Fehler";
        }
    }
?>
