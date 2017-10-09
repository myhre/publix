<?php
$eside = $_POST['eside'];
?>
<script type="text/javascript">
            tinyMCE.init({
                // General options
                mode : "textareas",
                theme : "advanced",
                plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                // Theme options
                theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "bullist,numlist,|,undo,redo,|,link,unlink,image,|,forecolor,backcolor,|,sub,sup,|,charmap,iespell,media",
                theme_advanced_buttons3 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : false,

                // Skin options
                skin : "o2k7",
                skin_variant : "silver",

                // Example content CSS (should be your site CSS)
                content_css : "stylesheets/layout.css",

                // Drop lists for link/image/media/template dialogs
                template_external_list_url : "js/template_list.js",
                external_link_list_url : "js/link_list.js",
                external_image_list_url : "js/image_list.js",
                media_external_list_url : "js/media_list.js",

                // Replace values for the template plugin
                template_replace_values : {
                    username : "Some User",
                    staffid : "991234"
                }
            });
        </script>
        
       
        <form method="post" id="lagelementfelt">
            <input id="eside" name="eside" value="<?php echo $eside;?>" type="hidden" />
        Overskrift: <input id='enavn' type='text' name='enavn'/>

        <textarea id="einnhold" name="innhold" style="width:100%;height:100%">
        </textarea>
        <button type='submit' name='lagelementbtn'>Lag element</button>
        
    </form>