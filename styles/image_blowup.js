const imageLargeSize = "750px";

function imageResize(img){
    if (img.style.width === imageLargeSize){
        img.style.width = "";
        img.style.height = "";
    }
    else {
        img.style.width = imageLargeSize;
        img.style.height = "auto";
    }
}