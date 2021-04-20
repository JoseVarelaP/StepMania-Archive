/**
 * 
 * @returns A table with key-named variables to use to parse.
 */
function getUrlVars() {
    let vars = {};
    let parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

/**
 * Toggles visibility on a element.
 * This is performed by simply checking it's visibility state, and returning back to table when available.
 * @param {HTMLElement} ActorElement 
 */
function ToggleVisibility( ActorElement ) {
    console.log( "I got " + ActorElement.style.display )
    ActorElement.style.display = ActorElement.style.display === "none" ? "table" : "none"
}

/**
 * Gets a value from the url parameters.
 * This follows a php-like syntax.
 * 
 * See {@link getUrlVars()} for more information on the parsing.
 * @param {string} parameter The key to look for.
 * @param {string} defaultvalue A default value in case the key is either invalid, or is not present.
 * @returns {string} The contents of the parameter.
 */
function getUrlParam(parameter, defaultvalue){
    let urlparameter = defaultvalue;
    if(window.location.href.indexOf(parameter) > -1){
        urlparameter = getUrlVars()[parameter];
    }
    return urlparameter;
}

/**
 * An array of elements that "supposedly" go across the entire site.
 */
const LastUpdate = {
    Date: 'March 31st, 2021',
    Size: '125.6GB',

    /**
     * Update the archive size information that is available.
     * This is only performed on the About page.
     */
    UpdateArchiveData: function()
    {
        const archivedata = document.getElementById("archivesize");
        let newtext = archivedata.textContent;
        newtext = newtext.replace( "${date}", LastUpdate.Date );
        newtext = newtext.replace( "${size}", LastUpdate.Size );
        archivedata.textContent = newtext;
    },
    ThanksTo: [
        "Giovanni Shawn - Allowing me to archive Sushi Violation",
        "MadkaT - Finding Club PARASTAR and Keys-Six",
        "Jousway - Mungyodance 2 video, Pointing out mistakes",
        "InfinitePhantasm - Finding StepManiaX Builds",
        "Nhan - Pointing out mistakes, ITG2PC Version history, ITG2PC R3 and ITGPC builds",
    ],
    GenerateThanks: function()
    {
        const s = document.getElementById("ThanksArea")
        const h = document.createElement("h2")
        h.textContent = "Special Thanks To";
        s.appendChild(h)
        for( let t of this.ThanksTo )
        {
            const a = document.createElement("p");
            a.textContent = t;
            s.appendChild(a);
        }
    },
    GenerateFooter: function()
    {
        const s = document.getElementById("Footer")
        if( s === null )
            return;
        
            s.style.margin = "5px 0px"

        const a = document.createElement("p");
        const d = new Date().getFullYear()
        a.innerHTML = `2017-${d}
        <a href="/">Jose_Varela</a>, with help from <a href="https://github.com/moruzerinho6">Moru Zerinho6</a>.`;
        // a.style.float = "right"
        s.appendChild(a);
    }
}

LastUpdate.GenerateFooter()