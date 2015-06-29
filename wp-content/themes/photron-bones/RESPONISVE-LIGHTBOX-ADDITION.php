 <?php
/* ADD THIS CODE TO RESPONSIVE-LIGHTBOX.PHP TO ENABLE FORWARD/BACK VIDEO GALLERY LIGHTBOX */
 public function add_links_videolightbox_selector($content)
    {
        preg_match_all('/<a(.*?)href=(?:\'|")((?:(?:http|https):\/\/)?(?:www\.)?((youtube\.com\/watch\?v=[a-z0-9_\-]+)|(vimeo\.com\/[0-9]{8,})))(?:\'|")(.*?)>/i', $content, $links);

        if (isset($links[0])) {
            if ($this->options['settings']['images_as_gallery'] === TRUE)
                $rel_hash = '[gallery-' . wp_generate_password(4, FALSE, FALSE) . ']';

            foreach ($links[0] as $id => $link) {
                if (preg_match('/<a.*?rel=(?:\'|")(.*?)(?:\'|").*?>/', $link, $result) === 1) {
                    if ($this->options['settings']['images_as_gallery'] === TRUE) {
                        $content = str_replace($link, preg_replace('/rel=(?:\'|")(.*?)(?:\'|")/', 'rel="' . $this->options['settings']['selector'] . $rel_hash . '"' . ($this->options['settings']['script'] === 'imagelightbox' ? ' data-imagelightbox="' . $id . '"' : ''), $link), $content);
                    } else {
                        if (isset($result[1])) {
                            $new_rels = array();
                            $rels = explode(' ', $result[1]);

                            if (in_array($this->options['settings']['selector'], $rels, TRUE)) {
                                foreach ($rels as $no => $rel) {
                                    if ($rel !== $this->options['settings']['selector'])
                                        $new_rels[] = $rel;
                                }

                                $content = str_replace($link, preg_replace('/rel=(?:\'|")(.*?)(?:\'|")/', 'rel="' . (!empty($new_rels) ? implode(' ', $new_rels) . ' ' : '') . $this->options['settings']['selector'] . '-' . $id . '"' . ($this->options['settings']['script'] === 'imagelightbox' ? ' data-imagelightbox="' . $id . '"' : ''), $link), $content);
                            } else
                                $content = str_replace($link, preg_replace('/rel=(?:\'|")(.*?)(?:\'|")/', 'rel="' . ($result[1] !== '' ? $result[1] . ' ' : '') . $this->options['settings']['selector'] . '-' . $id . '"' . ($this->options['settings']['script'] === 'imagelightbox' ? ' data-imagelightbox="' . $id . '"' : ''), $link), $content);
                        }
                    }
                } else
                    $content = str_replace($link, '<a' . $links[1][$id] . 'href="' . $links[2][$id] . '.' . $links[3][$id] . '"' . $links[4][$id] . ' rel="' . $this->options['settings']['selector'] . ($this->options['settings']['images_as_gallery'] === TRUE ? $rel_hash : '-' . $id) . '"' . ($this->options['settings']['script'] === 'imagelightbox' ? ' data-imagelightbox="' . $id . '"' : '') . '>', $content);
            }
        }

        return $content;
    }