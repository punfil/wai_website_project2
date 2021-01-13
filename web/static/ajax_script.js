function GetGallery(str) {
    
    gallery = document.getElementById('gallery');
    if (str.length > 0) {
        fetch('ajax_search_gallery?enq=' + str).then(result => result.text()).then(data => {
            ajax_gallery.innerHTML = data;
        });
    }
} 