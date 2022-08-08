let retrying = false;
let retryLoading;

export async function getIframeVimeo (url, callback) {
    try {
        fetch (`https://vimeo.com/api/oembed.json?url=${url}&byline=0&portrait=0&title=0&width=600&height=400`)
        .then(res => {
            console.log("res: ", res);
            if(res.status !== 200 && retrying === false){
                retrying = true;
                console.log("status code: ", res.status);
                retryLoading = setInterval(() => {
                    getIframeVimeo(url,callback);
                }, 5000);
            } else if (res.status === 200) {
                retrying = false;
                clearInterval(retryLoading);
                showVideo(res.json(), callback);
            }
        });
    } catch (error) {
        console.log(error);
    }
}

function showVideo(res, callback){
    res.then(data => {
        console.log("data: ", data);
        console.log("data.html: ", data.html);
        callback(data.html);

    })
}
