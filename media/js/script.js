/* Thumbnail rotation */
var rotateIndex = 0;
var rotateObject = false;
var rotateTimeout = false;

function rotate()
{
    if(rotateObject)
    {
    rotateIndex ++ ;
    rotateObject.src = rotateObject.src.replace(/[0-9]+\.jpg/,rotateIndex+'.jpg');
    if(rotateIndex > 2) rotateIndex = 0;
    rotateTimeout = setTimeout("rotate()",500);
    }
}

function startRotate()
{
    rotateObject = this;
    rotate();
}

function endRotate() {
    rotateIndex = -1;
    clearTimeout(rotateTimeout);
    rotateObject.src = rotateObject.src.replace(/[0-9]+\.jpg/,'0.jpg');    
    rotateObject = false;
    
}

/* start handlers etc */
 jQuery(document).ready(function() {
                jQuery(".rotate img").mouseover(startRotate);
                jQuery(".rotate img").mouseleave(endRotate);           
                jQuery(".rotate img").click(endRotate);           
                
            });

loaderVisible = true;
VFResult = "";
VFProxy = "";
VFThumbnail = "";

function vidfetchSearching()
{
    jQuery('#vidfetchLoader applet').width(0);
    jQuery('#vidfetchLoader applet').height(0);
    jQuery('#vidfetchSearching').show();
}

function vidfetchAppend(type,name,index,title)
{

    if(loaderVisible)
    {
        jQuery('#vidfetchSearching').hide();
        jQuery('#vidfetchLinks').show();
        loaderVisible = false;
    }

    name = name.replace("Low Quality","Low Quality");
    name = name.replace("Medium Quality","Medium Quality");
    name = name.replace("High Quality","High Quality");
    
    name = '<span class="type">[ '+type+' ]</span>' + name;

    var proxyLink = VFProxy+index+"/"+title+"."+type.toLowerCase();
    jQuery('.vthumb').html('<img src="'+VFThumbnail+'" alt="'+title+'" />');
    jQuery('.vtitle').html(title);
    if(type == 'MP3' || type == 'AAC')
    {
        jQuery('#vidfetchLinks ul.audio').append('<li class="type'+type+'"><a href="'+proxyLink+'"><span>'+name+'</span></a></li>');
    } else {
        jQuery('#vidfetchLinks ul.video').append('<li class="type'+type+'"><a href="'+proxyLink+'"><span>'+name+'</span></a></li>');
    }

}

function vidfetchDone()
{
    if(!loaderVisible)
    {
        return;
    }

    jQuery('#vidfetchSearching').hide();
    jQuery('#vidfetchError').show();
}

function vidfetchProxy(url)
{

}

function vidfetchError()
{
    jQuery('#vidfetchSearching').hide();
    jQuery('#vidfetchError').show();
}