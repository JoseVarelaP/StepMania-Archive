const VideoArchive = {
    // Display the information into a single page based on the ID.
    ObtainInformation : function( Info )
    {
        const VideoTitle = document.getElementById("VideoTitle");
        const VideoDescription = document.getElementById("VideoDescription");
        const VideoSource = document.getElementById("VideoSource");
        const VideoActor = document.getElementById("VideoActor");
        if( this.Items[Info.Category].Collections[ Info.Col ][ Info.ID ] )
        {
            const Section = this.Items[Info.Category].Collections[ Info.Col ]
            let key = Section[ Info.ID ];
            VideoTitle.textContent = `${Section.Name || ""} - ${key.Name}`;
            VideoDescription.textContent = key.Description;

            // "Container" : "In%20The%20Groove/ITGVideoPack1"
            const VideoUrl = Section.Container ? `${Section.Container}/${key.VideoLink}` : `${key.VideoLink}`
            
            VideoSource.setAttribute( 'src',  `https://objects-us-east-1.dream.io/smarchivefootage/${VideoUrl}` )
            VideoActor.load();
            document.title = `${key.Name} - StepMania Footage Archive`;

            // Is there information about the round? Then let's display it on a chart!
            /*
            Rundown: If ScoreInfo exists, then get information about who played the charts,
            and create a table to display all rounds played.
            "ScoreInfo" : {
                "Participants": [ "Maxx Storm", "Ceder" ],
                "Stages" : [
                    { "Song": "In The Groove 1 - Euphoria", "Scores": [ 94.72, 96.25 ] },
                    { "Song": "In The Groove 2 - Infection", "Scores": [ 98.74, 98.29 ] },
                    { "Song": "In The Groove 1 - Euphoria", "Scores": [ 95.39, 97.22 ] }
                ]
            }
            */
            if( key.ScoreInfo )
            {
                //console.log( key.ScoreInfo )

                const table = document.getElementById("MatchInfo")

                let row = table.insertRow();
                let cell = row.insertCell();
                cell = row.insertCell();
                cell.appendChild( document.createTextNode( "Song" ) )
                for( let p in key.ScoreInfo.Participants )
                {
                    cell = row.insertCell();
                    const ParticipantName = key.ScoreInfo.Participants[p];
                    cell.appendChild( document.createTextNode( ParticipantName ) )
                }

                // Now begin adding the data
                for( const StageData of key.ScoreInfo.Stages )
                {
                    //console.log( StageData )

                    let row = table.insertRow();
                    let cell = row.insertCell();
                    // console.log( key.ScoreInfo.Participants[i] )
                    let header = document.createElement("a")
                    if( StageData.TimeStamp )
                    {
                        function SeekPosition( NewTime )
                        {
                            VideoActor.currentTime = StageData.TimeStamp
                        }
                        header.onclick = SeekPosition
                    }
                    else
                    {
                        header = document.createElement("p")
                    }
					header.textContent = StageData.Song
                    row.appendChild( header )

                    let highestscore = 0
                    const NeedsIteration = key.ScoreInfo.Participants.length > 1

                    if( NeedsIteration )
                        for( let p = 0; p < key.ScoreInfo.Participants.length; p++ )
                            if (StageData.Scores[p] > StageData.Scores[highestscore])
                                highestscore = p

                    for( let p = 0; p < key.ScoreInfo.Participants.length; p++ )
                    {
                        cell = row.insertCell();
                        const text = document.createElement("p")
                        text.textContent = `${StageData.Scores[p].toFixed(2)}%`
                        cell.appendChild( text )

                        //console.log( `${p} - ${highestscore}, match = ${ p === highestscore }` )

                        if( NeedsIteration )
							cell.className = `matchinfo-${ p === highestscore ? "winner" : "loser" }`
                    }


                }
            } else {
				// Hide the table if no match was ever present.
                const table = document.getElementById("MatchInfo")
                table.style.display = "none"
            }
        }
    },

    // Put all of the available videos into tables.
    ListInformation : function()
    {
        const f = document.getElementById("BuildListing");
        for( let key in this.Items )
        {
            let h = document.createElement("h1")
            h.textContent = this.Items[key].Name;
            f.appendChild(h)
            const t = document.createElement("table");
            // console.log(key)
            const c = t.createTHead();
            for( let s in this.Items[key].Collections )
            {
                const collection = this.Items[key].Collections[s]

                let h = document.createElement("h2")
                if( collection.Name )
                    h.textContent = collection.Name;
                h.style = "font-size: 14px; width:auto"
                c.appendChild(h)

                for( let w in collection )
                {
                    let row = c.insertRow();
                    let cell;
                    const item = this.Items[key].Collections[s][w]

                    if( item.Name )
                    {
                        cell = row.insertCell();
                        const p = document.createTextNode( item.Name );
                        cell.appendChild(p);
                    }

                    if( item.VideoLink )
                    {
                        cell = row.insertCell();
                        const a = document.createElement("a");
                        const p = document.createTextNode( "Video" );
                        a.href = `FootageLookup.html?Category=${key}&Col=${s}&ID=${w}`;
                        a.appendChild(p);
                        cell.appendChild(a);
                    }
                }

                // row.appendChild(cell);
            }
            f.appendChild(t)
        }
    },

    sideBarGen : function( Info )
    {
        const Rc = document.getElementById("Info-Recorded");
        const Lo = document.getElementById("Info-Location");
        const Gm = document.getElementById("Info-Game");
        const Src = document.getElementById("Info-Source");
        const link = document.getElementById("Info-Source-Link");
        
        if( this.Items[Info.Category].Collections[ Info.Col ][ Info.ID ] )
        {
            const base = this.Items[Info.Category].Collections[ Info.Col ]
            const key = this.Items[Info.Category].Collections[ Info.Col ][ Info.ID ];

            let Recorded = key.RecordDate || ( base.RecordDate || undefined )
            let Location = key.Location || ( base.Location || undefined )
            let Game = key.Game || ( base.Game || undefined )
            
            if( Recorded )
                Rc.textContent = `Recorded: ${Recorded}`;

            if( Location )
                Lo.textContent = `Location: ${Location}`;

            if( Game )
                Gm.textContent = `Game: ${Game}`;

            if( key.Src ){
                // console.log(key.Src.Link);
                if( key.Src.Link )
                    {
                        link.textContent = `${key.Src.Name}`;
                        link.href = key.Src.Link;
                    }
                else
                    {
                        Src.textContent = `Source: ${key.Src.Name}`;
                    }
            }
        }
    },

    QuickTravel : function()
    {
        const ac = document.getElementById('quickaccess');
    
        const ListActor = document.createElement("ul");
        ListActor.style = "list-style-type: none; margin-left: -30px; margin-bottom: 20px";
        for(let Key in this.Items)
        {
            const Version = this.Items[Key];
            // 1= Create the List with li.
            const ListChild = document.createElement("li");
            ListChild.style = "margin-bottom: 6px";
            // 2= Create the link to click
            const ClickChild = document.createElement("a");
            // 3= Create the text.
            const t = document.createTextNode( Version.Name );
    
            // Now link them together.
            ClickChild.href = `#${Key}`;    
    
            ClickChild.appendChild( t );
            ListChild.appendChild( ClickChild );
    
            ListActor.appendChild( ListChild );
        }
        ac.appendChild( ListActor );
    },

    Items: []
}

// Obtain the JSON data to recieve the database of content.
const requestURL = './data.json'
const request = new XMLHttpRequest()
request.open('GET', requestURL)
request.responseType = 'json'

function GenerateFootageList()
{
    request.send()
    request.onload = function() {
        const data = request.response
        VideoArchive.Items = data
        // Once we have this data, we should probably check for fallbacks.
        // Now, generate the function to obtain the data.
        VideoArchive.ListInformation()
        VideoArchive.QuickTravel()
    }
}

function GenerateFootageLookup()
{
    request.send()
    request.onload = function() {
        const data = request.response;
        VideoArchive.Items = data;
        // Time to send in the values that we need to generate the changelog.
        // Get the value that we have on the url.
        let UrlData = getUrlVars();
        // Once we have this data, we should probably check for fallbacks.
        // Now, generate the function to obtain the data.
        VideoArchive.ObtainInformation( UrlData )
        VideoArchive.sideBarGen( UrlData )
    }
}

GenerateTopMenu()