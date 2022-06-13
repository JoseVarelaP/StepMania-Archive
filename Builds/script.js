import DateConv from '../js/DateConversion.js';
import sortByDate from '../js/TableDateSort.js'

const BuildArchive = {
    Builds : {},
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

            const buildname = this.Builds[Version].Name
            ClickChild.onclick = function()
            {
                const base = document.getElementById(`div${Version}`)
                // console.log( base )

                const table = base.getElementsByTagName('table')
                const Text = base.getElementsByTagName('p')
                const OpenButton = base.getElementsByClassName('VersionTitle')
                
                table[0].style.display = "table"
                Text[0].style.display = "table"

                // replace the initial character with the open state.
                OpenButton[0].textContent = `\u25BE ${buildname}`
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
        for(let Version in this.Builds)
        {
            const VersionContainer = document.createElement("div")
            VersionContainer.setAttribute( "id", `div${Version}` )

            const data = this.Builds[Version]
            // Create the header element that will be our pointer.
            const Header = document.createElement( "H1" );
            Header.style.cursor = "pointer"
            Header.className = "VersionTitle"
            const OpenButton = document.createTextNode( "\u25B8 " )
            const H3Text = document.createTextNode( data.Name )
            Header.setAttribute( "id", Version )
            Header.appendChild( OpenButton )
            Header.appendChild( H3Text )
            VersionContainer.appendChild(Header)

            // If the item has a description, then generate it.
            const Text = document.createElement( "p" );
            if( data.Description )
            {
                Text.textContent = data.Description
            }
            VersionContainer.appendChild(Text);

            // Does this item have a website where people can visit?
            const websiteLink = document.createElement("a")
            if( data.Website )
            {
                websiteLink.textContent = `Visit Website (${data.Website})`
                websiteLink.href = data.Website
            }
            VersionContainer.appendChild(websiteLink)

            // Create the table element to store the builds.
            const table = document.createElement( "table" );
            table.className = "TableBuildSet"
            // let s = Object.keys( data.Listing[0] );
            generateTable( table, data.Listing, data.DefaultIcon );
            generateTableHead( table );

            // Hide the objects to incentivize clicking.
            table.style.display = "none"
            Text.style.display = "none"
            websiteLink.style.display = "none"

            Header.onclick = function()
            {
                const state = table.style.display
                table.style.display = state === "none" ? "table" : "none"
                Text.style.display = state === "none" ? "table" : "none"
                websiteLink.style.display = state === "none" ? "table" : "none"
                OpenButton.textContent = state === "table" ? "\u25B8 " : "\u25BE "
				document.location.href = `#${Version}`
            }

            Header.addEventListener("mouseover", event => { event.target.style.color = "yellow" }, false)
            Header.addEventListener("mouseout", event => { event.target.style.color = "white" }, false)

            // Once all of the items have been created, append them to the Container.
            VersionContainer.appendChild(table);

            container.appendChild(VersionContainer)
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

	// Special rule for date
	if (key === 'Date')
	{
		th.onclick = function()
		{
			sortByDate( table, 2 )
		}
	}

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
                a.href = `BuildChangeLogs.html?Version=${element.ID}`;
                cell.appendChild(a);
            } else {
                // Otherwise, it's regular text.
                let text = document.createTextNode( element.Name );
                cell.appendChild(text)
            }
        }

        // Get the build's date.
        cell = row.insertCell();
        let text = document.createElement( "p" );
        text.textContent = DateConv( element.Date )
        cell.appendChild(text)

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
					//window.location
					const elementlength = element[Version].length
					if( elementlength < 2 )
					{
						const a = document.createElement('a'); 
						const link = document.createTextNode( element[Version][0].Name );
						a.title = "Available";
						a.innerHTML = element[Version][0].Name
						a.href = element[Version][0].Link;
						cell.appendChild(a);
					} else {
						const sel = document.createElement('select');
						
						// Add the fallback option.
						var fal = document.createElement('option')
						fal.text = "Select"
						fal.hidden = true
						fal.selected = true

						sel.add( fal )
						for ( let i = 0; i < elementlength; i++ ){
							const a = document.createElement('option');
							a.text = element[Version][i].Name;
							a.value = element[Version][i].Link;
							sel.add(a)
						}

						sel.onchange = function() {
							window.location = this.value
							console.log( this.value )
						}
						cell.appendChild(sel);
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

// import * as functionimporter from '../TopMenu.js'
let arequestURL = './ArchiveChanges.json'
let arequest = new XMLHttpRequest();
arequest.open('GET',arequestURL);
arequest.responseType = 'json';
arequest.send();
arequest.onload = function() {
    const data = arequest.response;
    UpdateHistory.List = data;
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    UpdateHistory.GenerateFullHistory(true);
    GenerateTopMenu();
}

let requestURL = './BuildListing.json'
let request = new XMLHttpRequest();
request.open('GET',requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    BuildArchive.Builds = data;
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    BuildArchive.QuickTravelGeneration();
    BuildArchive.GenerateTable();

    const url = window.location.href
    if( url.lastIndexOf('#') !== -1 )
    {
        const GroupOpen = url.substring( url.lastIndexOf('#') + 1 )
        if( GroupOpen.length > 1 && document.getElementById(GroupOpen) )
        {
            const base = document.getElementById(`div${GroupOpen}`)
            // console.log( base )
            const table = base.getElementsByTagName('table')
            const Text = base.getElementsByTagName('p')
            const Website = base.getElementsByTagName('a')
            const OpenButton = base.getElementsByClassName('VersionTitle')
            table[0].style.display = "table"
            Text[0].style.display = "table"
            Website[0].style.display = "table"
			document.getElementById(GroupOpen).scrollIntoView(true)
            // replace the initial character with the open state.
            OpenButton[0].textContent = `\u25BE ${ BuildArchive.Builds[GroupOpen].Name }`
        }
    }
}