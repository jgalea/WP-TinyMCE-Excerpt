<?php
    /*
    Plugin Name: WP TinyMCE Excerpt
    Plugin URI: http://www,jeangalea.com
    Description: Description
    Version: 1.0
    Author: Jean Galea
    Author URI: http://www.jeangalea.com
    Tags: excerpt, html, tinymce, tinymce excerpt
    License: GPLv2
    */
   
    /*
    Initial code from http://haet.at/add-tinymce-editor-wordpress-excerpt-field/
    Packaged into a plugin by Jean Galea and uploaded to GitHub for open collaboration 
    and improvements.    
    */

    /*  
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
    */

    function tinymce_excerpt_js(){ ?>
        <script type="text/javascript">
                jQuery(document).ready( tinymce_excerpt );
                    function tinymce_excerpt() {
                        jQuery("#excerpt").addClass("mceEditor");
                        tinyMCE.execCommand("mceAddControl", false, "excerpt");
                        tinyMCE.onAddEditor.add(function(mgr,ed) {
                            if(ed.id=="excerpt"){
                                ed.settings.theme_advanced_buttons2 ="";
                                ed.settings.theme_advanced_buttons1 = "bold,italic,underline,seperator,justifyleft,justifycenter,justifyright,separator,link,unlink,seperator,pastetext,pasteword,removeformat,seperator,undo,redo,seperator,spellchecker,";
                            }
                        });
                    }
        </script>
    <?php }
    add_action( 'admin_head-post.php', 'tinymce_excerpt_js');
    add_action( 'admin_head-post-new.php', 'tinymce_excerpt_js');
    
    function tinymce_css(){ ?>
        <style type='text/css'>
            #postexcerpt .inside{margin:0;padding:0;background:#fff;}
            #postexcerpt .inside p{padding:0px 0px 5px 10px;}
            #postexcerpt #excerpteditorcontainer { border-style: solid; padding: 0; }
        </style>
    <?php }
    add_action( 'admin_head-post.php', 'tinymce_css');
    add_action( 'admin_head-post-new.php', 'tinymce_css');
 
    function prepareExcerptForEdit($e){
        return nl2br($e);
    }
    add_action( 'excerpt_edit_pre','prepareExcerptForEdit');
