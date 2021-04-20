// Container for functions/Data
const BuildNames = {}

const VersionChangelog = {
    // Functions that can be used.
    /**
     * 
     * @param {string} ID - ?
     * @param {string} Name - ?
     */
    GenerateData : function( ID, Name = "" ) {
        // Iterate through the table to match what we need.
        // Get the name of the build.
        // Show the changes. These are usually in a list form.
        if( this.Logs[ID] )
        {
            const data = this.Logs[ID];
            
            const hcont = document.getElementById('changelog');
            // Special case to make Markdown menus more like how it would look over there.
            const header = document.createElement("h5");
            header.style.cursor = "pointer"
            const text = Name.replace( "%20", " " )
            
            if( text )
            {
                header.textContent = `\u25B8 ${text} ChangeLog`;
            }
            
            hcont.appendChild(header);
            
            if( data.Name )
            {
                header.innerHTML = `\u25B8 ${data.Name}`
                document.title = `${data.Name} - StepMania Build Archive`
            }
            
            header.addEventListener("mouseover", event => { event.target.style.color = "yellow" }, false)
            header.addEventListener("mouseout", event => { event.target.style.color = "white" }, false)
            header.onclick = function()
            {
                // Need to return the user to the previous page.
                window.history.go(-1)
            }
            
            if( data.Changes )
            {
                let ListActor = document.createElement("ul");
                for( ch of data.Changes )
                {
                    let ListChild = document.createElement("li");
                    let p = document.createElement("p");
                    p.innerHTML = ch;
                    ListChild.appendChild( p );
                    ListActor.appendChild( ListChild );
                    console.log( ch );
                }
                hcont.appendChild( ListActor );
            }

            if( data.HTMLParse )
            {
                const contain = document.createElement("p")
                contain.className = "ChangeLogData"
                contain.style = "width: 98%; margin-left: 10px; margin-top: 10px"

                /*
                for( ch of data.HTMLParse )
                {
                    let p = document.createElement("p");
                    // 94% is the magic number, do not change
                    p.style = "width: 98%; margin-left: 10px"
                    p.innerHTML = ch;
                    hcont.appendChild( p );
                    // console.log( ch );
                }
                */

                var phprequest = new URLSearchParams();
                phprequest.append('text', `./${data.HTMLParse}`);
                
                // TIME TO FETCH PHP
                fetch("fetch.php", {
                    method: 'post',
                    body: phprequest
                })
                .then(function (response) { return response.text(); })
                .then(function (text) {
                    // console.log(text);
                    contain.innerHTML = text;
                    hcont.appendChild(contain)
                })
                .catch(function (error) { console.log(error) });
            }
        }
    },

    // Database time
    Logs: {}
}

let requestURL = './ChangeLogs.json'
let request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    VersionChangelog.Logs = data;
    // Time to send in the values that we need to generate the changelog.
    // Get the value that we have on the url.
    let UrlData = getUrlVars();
    // Once we have this data, we should probably check for fallbacks.
    // Now, generate the function to obtain the data.
    VersionChangelog.GenerateData( UrlData.Version, UrlData.Name )
}