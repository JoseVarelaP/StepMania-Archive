let Characters = {}

let container = document.getElementById('CharListing');
function GenCharacterListing()
{
    for( let key in Characters )
    {
        const table = document.createElement( "div" );
        
        // Create the header element that will be our pointer.
        const Version = Characters[key];
        const CharLink = document.createElement( "a" );
        const CharImage = document.createElement( "img" );
        
        // Make them all generate `https://s3.us-east-005.dream.io/smcharacters/`
        CharLink.href = `https://s3.us-east-005.dream.io/smcharacters/${Version.File}`;

        CharImage.src = `https://s3.us-east-005.dream.io/smcharacters/img/${key}.png`
        CharImage.style = "max-height: 96px; padding: 1px 2px;";
        CharLink.appendChild(CharImage)
        table.appendChild(CharLink);

        table.appendChild( document.createElement( "br" ) );
        const p = document.createTextNode( key );
        table.appendChild( p );

        container.appendChild(table);
    }
}

const requestURL = './db.json'
const request = new XMLHttpRequest()
request.open('GET', requestURL)
request.responseType = 'json'
request.send()
request.onload = function() {
    const data = request.response
    Characters = data
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    GenCharacterListing()
    GenerateTopMenu()
}