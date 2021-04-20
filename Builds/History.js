const UpdateHistory = {
    List : [],
    /**
     * Generates a history of the changelog.
     * @param {boolean} PerformStart - If on, generate the first item only or all of them.
     */
    GenerateFullHistory : function( PerformStart = false )
    {
        const hcont = document.getElementById('History');
        // console.log( this.List )
        // console.log( `History::GenerateFullHistory(${PerformStart})` );
        let Ending = this.List.length;
        if( PerformStart )
            Ending = 1;

        for( let i = 0; i < Ending; i++ )
        {
            // Generate the date first.
            let DateAc = document.createElement( "H1" );
            if( !PerformStart )
                DateAc.style.cursor = "pointer"
            let HeaderText = this.List[i].Date;
            if( PerformStart )
                HeaderText = `Updates - ${HeaderText}  `;
            let DateText = document.createTextNode( HeaderText );
            DateAc.appendChild(DateText);
            hcont.appendChild( DateAc );

            // If we're in the single view mode, provide a link for easy access to the entire
            // changelog.
            if( PerformStart )
            {
                let linkArea = document.createElement( "a" );
                let b = document.createTextNode( "(Past Updates)" );
                linkArea.href = "PastUpdates.html";
                linkArea.appendChild( b );
                DateAc.appendChild( linkArea );
            } else {
                DateAc.addEventListener("mouseover", event => { event.target.style.color = "yellow" }, false)
                DateAc.addEventListener("mouseout", event => { event.target.style.color = "white" }, false)
            }

            const divContainer = document.createElement("div")
            for( Version of this.List[i].Changes )
            {
                // console.log(Version)
                // Header for each element
                const DateSubAc = document.createElement( "H2" );
                if ( Version.Icon )
                {
                    const Icon = document.createElement( "img" );
                    Icon.style = 'width: 24px';
                    const ImagePath = `VersionIcon/${Version.Icon}`
                    Icon.src = ImagePath;
                    DateSubAc.appendChild( Icon );
                }

                // Generate the text alongside the icon.
                const DateText = document.createTextNode(  ` ${Version.Name}` );
                
                DateSubAc.appendChild(DateText);
                divContainer.appendChild( DateSubAc );

                let ListActor = document.createElement("ul");
                ListActor.setAttribute("id","Text")
                for( Listing of Version.List )
                {
                    let t = document.createElement("p")
                    t.innerHTML = Listing
                    
                    let ListChild = document.createElement("li");
                    ListChild.appendChild( t );
                    
                    ListActor.appendChild( Listing ? ListChild : document.createElement("br") );
                }
                divContainer.appendChild( ListActor );
    
            }
            // Leave the first item to be visible.
            if( i !== 0 )
                divContainer.style.display = "none"

            if( !PerformStart )
                DateAc.onclick = () => {
                    ToggleVisibility( divContainer )
                }
                
            hcont.appendChild(divContainer)
        }
    }
}

function GenerateHistoryInfo( set = false )
{
    let arequestURL = './ArchiveChanges.json'
    let arequest = new XMLHttpRequest();
    arequest.open('GET', arequestURL);
    arequest.responseType = 'json';
    arequest.send();
    arequest.onload = function() {
        const data = arequest.response;
        UpdateHistory.List = data;
        // Once we have this data, we should probably check for fallbacks.
        // Now, generate the function to obtain the data.
        UpdateHistory.GenerateFullHistory( set );
        GenerateTopMenu();
    }
}