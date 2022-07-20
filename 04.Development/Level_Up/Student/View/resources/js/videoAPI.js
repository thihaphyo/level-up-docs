export async function getIframeYoutube (url, callback) {

    let regExp =
        /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    let match = url.match(regExp);

    let videoId = match && match[7].length == 11 ? match[7] : false;

    let apiKey = '' //ADD YOUR API KEY HERE;
    let apiURL = 'https://www.googleapis.com/youtube/v3/videos?part=player&id='+ videoId +'&key=' + apiKey;

    await fetch(apiURL)
        .then(res => res.json())
        .then(response => {
            callback(response['items'][0]['player']['embedHtml'])
        });
        
}


export async function getIframeVimeo (url, callback) {
    fetch (`https://vimeo.com/api/oembed.json?url=${url}&byline=0&portrait=0&title=0&width=600&height=400`)
        .then(res => res.json())
        .then(data => {
            callback(data.html);
        });
}