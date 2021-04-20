let requestURL = './data.json'
let request = new XMLHttpRequest();
request.open('GET', requestURL, true);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    VideoArchive.Items = data;
}