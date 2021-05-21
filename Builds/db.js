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
                }
                hcont.appendChild( ListActor );
            }

            if( data.HTMLParse )
            {
                const contain = document.createElement("p")
                contain.className = "ChangeLogData"
                contain.style = "width: 98%; margin-left: 10px; margin-top: 10px"

                var phprequest = new URLSearchParams();
                phprequest.append('text', `./${data.HTMLParse}`);

                let l = getUrlVars();
                var client = new XMLHttpRequest();
                client.open('GET', `./HTMLChangeLog/${data.HTMLParse}`);
                client.onreadystatechange = function() {
                    if(client.readyState === XMLHttpRequest.DONE) {
                        var status = client.status;
                        if (status === 0 || (status >= 200 && status < 400)) {
                            contain.innerHTML = marked(client.responseText);
                        } else {
                            contain.innerHTML = marked(`No page (${l.ID}) was found...`);
                        }
                        hcont.appendChild(contain)
                    }
                }
                client.send();
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