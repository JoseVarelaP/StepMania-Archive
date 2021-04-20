let Contents = {}

const container = document.getElementById('BuildListing');

function GenAnnouncerTable()
{
    const table = document.createElement( "table" );
    const names = [ "Name", "Author", "Sample" ];
    const thead = table.createTHead();
    let row = thead.insertRow();
    for( let key of names )
    {

        let th = document.createElement("th");
        let text = document.createTextNode( key );
        th.appendChild(text);
        row.appendChild(th);
    }

    for( let key in Contents )
    {
        table.id = ""
        const row = table.insertRow();
        
        const Version = Contents[key];
        let cell = row.insertCell()
        const Link = document.createElement("a");
        Link.href = `https://objects-us-east-1.dream.io/smannouncers/${Version.File}`;
        let Title = document.createTextNode( key );
        Link.appendChild( Title )
        cell.appendChild(Link);
        row.appendChild(cell);
        table.appendChild(row);

        cell = row.insertCell()
        const text = Version.Author || ""
        const afh = document.createTextNode( text );
        cell.appendChild(afh);
        row.appendChild(cell);

        // Time for samples.

        const SampleAudios = [ "Attract" ]
        for( item in SampleAudios )
        {
            let cell = row.insertCell()
            let AudioFile = document.createElement( "a" );

            AudioFile.textContent = "Preview"
            AudioFile.href = `https://objects-us-east-1.dream.io/smannouncers/AudioPreview/${key}.ogg`
            cell.appendChild( AudioFile );
            row.appendChild(cell);
            table.appendChild(row);
        }
        container.appendChild(table);
    }
}

GenerateTopMenu()

const requestURL = './db.json'
const request = new XMLHttpRequest();
request.open('GET',requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    Contents = data;
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    GenAnnouncerTable();
}