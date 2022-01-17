const NoteSkinArchive = {
    Builds : {},

    /**
     * The color types that are defined for non-vivid noteskins.
     * @num 0 - Quantized
     * @num 1 - Column
     * @num 2 - Flat
     * @num 3 - Other (If any fails)
     */
    ColorTypes : [ "Quantized", "Column", "Flat", "Other" ],
    NoteShapes : [ "Arrow", "Bar", "Other" ],
    /**
     * Create the Quick travel side pane that will contain the versions
     * from each build generation.
     */
    QuickTravelGeneration : function()
    {
        const ac = document.getElementById('quickaccess');
        const ListActor = document.createElement("ul");
        ListActor.style = "list-style-type: none; margin-left: -30px; margin-bottom: 20px";
        for(let Version in this.Builds)
        {
            /**
             * 1= Create the List with li.
             */
            const ListChild = document.createElement("li");
            ListChild.style = "margin-bottom: 6px";
            /**
             * 2= Create the link to click
             */
            const ClickChild = document.createElement("a");
            /**
             * 3= Create the text.
             * */ 
            const t = document.createTextNode( this.Builds[Version].Name );

            // Now link them together.
            ClickChild.href = `#${Version}`;

            const buildname = this.Builds[Version].Name;
            ClickChild.onclick = function()
            {
                const base = document.getElementById(`div${Version}`);
                // console.log( base )

                const table = base.getElementsByTagName('table');
                const Text = base.getElementsByTagName('p');
                const OpenButton = base.getElementsByClassName('VersionTitle');
                
                table[0].style.display = "table";
                Text[0].style.display = "table";

                // replace the initial character with the open state.
                OpenButton[0].textContent = `\u25BE ${buildname}`;
            }
            
            // // Special marker if the current tab is the one the user is currently in.
            // if( v.Name === "Builds" )
            //     ClickChild.setAttribute( "id", "current" );

            ClickChild.appendChild( t );
            ListChild.appendChild( ClickChild );

            ListActor.appendChild( ListChild );
        }
        ac.appendChild( ListActor );
    },

    /**
     * Generates a table from the contents from this.Builds.
     */
    GenerateTable : function()
    {
        const container = document.getElementById('BuildListing');
        for(const BuildVersion in this.Builds)
        {
            // console.log( BuildVersion )
            const GameVersionContainer = document.createElement("div")
            
            const GameVersionHeader = document.createElement("h1");
            GameVersionHeader.textContent = BuildVersion;
            container.appendChild(GameVersionHeader);

            // console.log( BuildVersion )
            for( const NoteColorType in this.Builds[BuildVersion] )
            {
                const ColorTypeContainer = document.createElement("div");
                const ColorTypeHeader = document.createElement("h2");

                ColorTypeHeader.textContent = NoteColorType;

                ColorTypeContainer.appendChild( ColorTypeHeader );
                GameVersionContainer.appendChild( ColorTypeContainer );

                ColorTypeContainer.style.display = "none";
                // console.log( NoteColorType )
                
                for( const NoteSkin in this.Builds[BuildVersion][NoteColorType] )
                {
                    const NSData = this.Builds[BuildVersion][NoteColorType][NoteSkin];
                    const NoteSkinContainer = document.createElement("div");
                    NoteSkinContainer.className = "NoteSkin_Container";

                    const NoteSkinPreviewNote = document.createElement("img");
                    NoteSkinPreviewNote.alt = "Note";
                    NoteSkinPreviewNote.src = `https://objects-us-east-1.dream.io/smnoteskins/SM5/${NoteSkin}-note.gif`;

                    const NoteSkinPreviewMine = document.createElement("img");
                    NoteSkinPreviewMine.alt = "Mine";
                    NoteSkinPreviewMine.src = `https://objects-us-east-1.dream.io/smnoteskins/SM5/${NoteSkin}-mine.gif`;

                    // const NoteSkinPreviewLift = document.createElement("img")
                    // NoteSkinPreviewLift.src = `https://objects-us-east-1.dream.io/smnoteskins/SM5/${NoteSkin}-Lift.gif`

                    const NoteSkinName = document.createElement("p");
                    NoteSkinName.innerHTML = `${NSData.Name || NoteSkin}<br>by: ${NSData.Author || "?"}`;
                    
                    const NSkinDate = document.createElement("p");
                    NSkinDate.id = "Date"
                    NSkinDate.textContent = NSData.Date || "????-??-??";

                    // const NoteSkinAuthor = document.createElement("p")
                    // NoteSkinAuthor.textContent = NSData.Author || ""

                    NoteSkinContainer.appendChild(NoteSkinPreviewNote);
                    NoteSkinContainer.appendChild(NoteSkinPreviewMine);
                    // NoteSkinContainer.appendChild(NoteSkinPreviewLift)
                    NoteSkinContainer.appendChild(NoteSkinName);
                    NoteSkinContainer.appendChild(NSkinDate);

                    if( NSData.Download )
                    {
                        if( typeof NSData.Download === "object" )
                        {
                            const DownloadLink = document.createElement("p");
                            let str = "";
                            for( const links in NSData.Download )
                            {
                                str = str + `<a href='https://objects-us-east-1.dream.io/smnoteskins/${BuildVersion}/${ NSData.Download[links] }'>${links}</a>`;
                                if( links )
                                    str = str + "<hr>";
                            }
                            DownloadLink.innerHTML = str;
                            NoteSkinContainer.appendChild(DownloadLink);
                        }
                        else
                        {
                            const DownloadLink = document.createElement("a");
                            DownloadLink.textContent = "Download";
                            DownloadLink.href = `https://objects-us-east-1.dream.io/smnoteskins/${BuildVersion}/${ NSData.Download }`;
                            NoteSkinContainer.appendChild(DownloadLink);
                        }
                    }

                    // NoteSkinContainer.appendChild(DownloadLink)
                    // NoteSkinContainer.appendChild(NoteSkinAuthor)

                    GameVersionContainer.appendChild( NoteSkinContainer );
                    // console.log( NoteSkin )
                }
            }

            container.appendChild( GameVersionContainer );
        }
    }
}

// Time for functions!
/**
 * Generate the head of contents for the table elements. This is specifically
 * used for generating the listing for what builds are available for a specific arch.
 * @param {HTMLTableElement} table - The table to include the head objects into.
 */
function generateTableHead(table) {
    const thead = table.createTHead();
    const row = thead.insertRow();
    const ItemSets = [ 'Icon','Name','Date','Windows','Mac','Linux','Src' ];

    for (let key of ItemSets) {
      const th = document.createElement("th");
      const text = document.createTextNode(key);
      th.appendChild(text);
      row.appendChild(th);
    }
}
  
/**
 * Generates the elements to send
 * @param {HTMLTableElement} table 
 * @param {Array} data 
 * @param {string} DefaultIcon 
 */
function generateTable(table, data, DefaultIcon) {
    for (const element of data) {
        const row = table.insertRow();
        let cell;
        
        // Text actor for items. Can be overwritten.
        // let text = document.createTextNode(element[key]);

        // Let's start by obtaining the ID, icon and stuff like that.
        // console.log( element );
        cell = row.insertCell();
        const img = document.createElement("img");
        img.style = "width: 24px";
        if( element.Icon )
            img.src = `VersionIcon/${element.Icon}`;
        else
            // But to save some space and duplicates, DefaultIcon can help.
            if( DefaultIcon )
                img.src = `VersionIcon/${DefaultIcon}`;
        cell.appendChild(img)

        // Get the build name
        if( element.Name )
        {
            cell = row.insertCell();
            // If the build listing has the ID tag, then that means we can access the changelog/history.
            // So for that occasion, create a hyperlink instead of text.
            if( element.ID )
            {
                let text = document.createTextNode( element.Name );
                const a = document.createElement('a'); 
                a.appendChild(text);
                a.href = `BuildChangeLogs.php?Version=${element.ID}`;
                cell.appendChild(a);
            } else {
                // Otherwise, it's regular text.
                let text = document.createTextNode( element.Name );
                cell.appendChild(text)
            }
        }

        // Get the build's date.
        if( element.Date )
        {
            cell = row.insertCell();
            let text = document.createTextNode( element.Date );
            cell.appendChild(text)
        }

        // Get the build links.
        // For this one, we'll iterate through the available versions.
        // These are the available instances of what the build types can be.
        const acceptedLanguages = ['Windows', 'Mac', 'Linux', 'Src'];

        for( let Version of acceptedLanguages )
        {
            cell = row.insertCell();
            // If the item exists, create the link!
            if( element[Version] )
            {
                // If the object is a table (object), then we have to
                // iterate through them all, in a <hr>thing</hr> style.
                if( typeof element[Version] === 'object' )
                {
                    for ( let i = 0; i < element[Version].length; i++ ){
                        const a = document.createElement('a'); 
                        const link = document.createTextNode( element[Version][i].Name );
                        a.appendChild(link);
                        a.title = "Available";
                        a.href = element[Version][i].Link;
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
                    a.href = element[Version];
                    cell.appendChild(a);
                }
            }
            // If there's no data at all, just generate the not available tag.
            else {
                let an = document.createTextNode("-");
                cell.appendChild(an);
            }
        }
    }
}

let requestURL = './db.json'
let request = new XMLHttpRequest();
request.open('GET',requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    NoteSkinArchive.Builds = data;
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    // NoteSkinArchive.QuickTravelGeneration();
    NoteSkinArchive.GenerateTable();

    // alert( "Hi i got the file" )

    /*
    const url = window.location.href
    if( url.lastIndexOf('#') !== -1 )
    {
        const GroupOpen = url.substring( url.lastIndexOf('#') + 1 )
        if( GroupOpen.length > 1 )
        {
            const base = document.getElementById(`div${GroupOpen}`)
            // console.log( base )
            const table = base.getElementsByTagName('table')
            const Text = base.getElementsByTagName('p')
            const OpenButton = base.getElementsByClassName('VersionTitle')
            table[0].style.display = "table"
            Text[0].style.display = "table"
            // replace the initial character with the open state.
            OpenButton[0].textContent = `\u25BE ${ NoteSkinArchive.Builds[GroupOpen].Name }`
        }
    }
    */

    GenerateTopMenu()
}
