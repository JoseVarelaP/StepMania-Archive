const ToolsArchive = {
    Items : {},
    CreateInfo : function()
    {
        const container = document.getElementById( 'BuildListing' )
        
        for(let Key in this.Items)
        {
            // Master element
            const ToolHeader = document.createElement("div")

            const Version = this.Items[Key];
            const Header = document.createElement( "H1" );
            let H3Text = document.createTextNode( Version.Name );
            Header.setAttribute( "id", Key );
            Header.appendChild( H3Text );
            ToolHeader.appendChild( Header );
    
            const SideFlex = document.createElement("div")
            SideFlex.className = "ToolSideFlex"
            // If the item has a description, then generate it.
            if( Version.Description )
            {
                const Text = document.createElement( "p" );
                // let H3Text = document.createTextNode( Version.Description );
                Text.innerHTML = Version.Description;
                Text.setAttribute( "id", Version.Description );
                SideFlex.appendChild( Text );
            }
    
            // If there's a picture available, then let's use it.
            if( Version.Picture )
            {
                let Text = document.createElement( "img" );
                Text.setAttribute( "src", Version.Picture );
                Text.className = "ToolImagePreview"
                // Text.style = "width: 260px; padding: 20px; margin-top: -50px ;float: left; vertical-align: text-top;";
                SideFlex.appendChild( Text );
            }

            ToolHeader.appendChild(SideFlex)
    
            // Create the table element to store the builds.
            const table = document.createElement( "table" );
            table.className = "TableToolSet"
            // Don't actually need it
            // const data = Object.keys( Version.Listing[0] );
            
            generateTable( table, Version.Listing , Key );
            
            generateTableHead( table );
            table.setAttribute( "id", Key );
    
            // Once all of the items have been created, append them to the container.
            ToolHeader.appendChild( table );

            container.appendChild(ToolHeader);
        }
    },

    QuickTravelGeneration : function()
    {
        const ac = document.getElementById( 'quickaccess' );
    
        let ListActor = document.createElement( "ul" );
        ListActor.style = "list-style-type: none; margin-left: -30px; margin-bottom: 20px";
        for(let Key in this.Items)
        {
            const Version = this.Items[Key];
            // 1= Create the List with li. SECURE THE KEYS
            const ListChild = document.createElement( "li" );
            ListChild.style = "margin-bottom: 6px";
            // 2= Create the link to click. ASCEND FROM THE DARKNESS
            const ClickChild = document.createElement( "a" );
            // 3= Create the text. RAIN FIRE
            const t = document.createTextNode( Version.Name );
    
            // Now link them together.
            ClickChild.href = `#${Key}`;
            
            // // Special marker if the current tab is the one the user is currently in.
            // if( v.Name === "Builds" )
            //     ClickChild.setAttribute( "id", "current" );
    
            ClickChild.appendChild( t );
            ListChild.appendChild( ClickChild );
    
            ListActor.appendChild( ListChild );
        }
        ac.appendChild( ListActor );
    }
}

// Time for functions!
/**
 * 
 * @param {HTMLTableElement} table
 */
function generateTableHead(table) {
    const thead = table.createTHead();
    const row = thead.insertRow();
    const ItemSets = [ 'Name','Date','Windows','Mac','Linux','Src' ];

    for (let key of ItemSets) {
      const th = document.createElement("th");
      const text = document.createTextNode(key);
      th.appendChild(text);
      row.appendChild(th);
    }
}

/**
 * @typedef BuildData
 * @property {string} Name - What version is this release named.
 * @property {'MM-DD-YYYY'} Date - When this version was published.
 * @property {string} [Src] - The build code source download.
 * @property {string} [Windows] - The build windows version.
 * @property {string} [Mac] - The build mac version.
 * @property {string} [Linux] - The build linux version.
 */

/**
 * Generates the build versions table.
 * @param {HTMLTableElement} table
 * @param {BuildData[]} data - The JSON with all the builds data.
 * @param {string} Identifier
 */
function generateTable(table, data, Identifier) {
    const ItemSets = [ 'Name','Date','Windows','Mac','Linux','Src' ];
    // console.log( data );
    for (let element of data) {
        const row = table.insertRow();

        // Get the build name
        if( element.Name )
        {
            cell = row.insertCell();
            const text = document.createTextNode( element.Name );
            cell.appendChild(text)
        }

        // Get the build's date.
        if( element.Date )
        {
            cell = row.insertCell();
            const text = document.createTextNode( element.Date );
            cell.appendChild(text)
        }

        // Get the build links.
        // For this one, we'll iterate through the available versions.
        // These are the available instances of what the build types can be.
        const acceptedLanguages = ['Windows', 'Mac', 'Linux', 'Src']

        for( let Version of acceptedLanguages )
        {
            cell = row.insertCell();
            // If the item exists, create the link!
            if( element[Version] )
            {
                // If the object is a table (object), then we have to
                // iterate through them all, in a <hr>thing</hr> style.
                if( typeof( element[Version] ) === 'object' )
                {
                    for ( let i = 0; i < element[Version].length; i++ ){
                        const a = document.createElement('a'); 
                        const link = document.createTextNode( element[Version][i].Name );
                        a.appendChild(link);
                        a.title = "Available";
                        a.href = `https://objects-us-east-1.dream.io/smtools/${Identifier}/${element[Version][i].Link}`;
                        cell.appendChild(a);
                        if( i < element[Version].length-1 )
                            cell.appendChild( document.createElement("hr") );
                    }
                // Otherwise, it's a single item, so just add the link.
                } else {
                    const a = document.createElement('a'); 
                    const link = document.createTextNode("Available");
                    a.appendChild(link);
                    a.title = "Available";
                    a.href = `https://objects-us-east-1.dream.io/smtools/${Identifier}/${element[Version]}`;
                    cell.appendChild(a);
                }
            }
            // If there's no data at all, just generate the not available tag.
            else {
                const an = document.createTextNode("-");
                cell.appendChild(an);
            }
        }
    }
}

const requestURL = './db.json'
const request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    ToolsArchive.Items = data;
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    ToolsArchive.CreateInfo()
    ToolsArchive.QuickTravelGeneration();
    GenerateTopMenu();
}