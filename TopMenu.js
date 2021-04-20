let PageList = [
    { Name: 'Announcers', /* Margin: -8, */ Color: '#227700' },
    { Name: 'Builds', /* Margin: -130, */ Color: '#F1CD00',
        Subpages : { "Builds Listing": "index.html", "Credits":"Credits.html" }
    },
    { Name: 'NoteSkins', /* Margin: -70, */ Color: '#772200' },
    { Name: 'Themes', /* Margin: -91, */ Color: '#001177',
        Subpages : { "Theme Update (WIP)": "ThemeUpdate.html" }
    },
    { Name: 'Characters', /* Margin: -20, */ Color: '#772200' },
    { Name: 'Footage', /* Margin: -130, */ Color: '#550055' },
    { Name: 'Tools', /* Margin: -250, */ Color: '#005599',
        Subpages : { "Font Conversion Guide": "FontConversionGuide.html" }
    },
    { Name: 'About', /*Margin: -50,*/ Color: '#002211' },
]

let TMS = document.getElementById('top-menu');

/**
 * The pages contain a message to verify that Javascript is not enabled, and that it must be enabled
 * to visit the site. This check will verify this process by removing it (if it is available).
 */
function CheckJavascriptMessage()
{
    let jv = document.getElementById( "JavaMessage" );
    if( jv !== null )
        jv.remove()
}

function GenerateTopMenu()
{
    // Since we already know that JS is enabled, remove the message.
    CheckJavascriptMessage()
    
    let ListActor = document.createElement("ul");
    
    let discordlink = document.createElement('a');
    let discordicon = document.createElement('img');
    
    discordlink.href = "https://discord.gg/uMkVUrr";
    discordicon.src = "../static/discord_icon.png";
    discordicon.setAttribute("id","discord");
    discordlink.appendChild(discordicon);
    
    TMS.appendChild(discordlink);
    for( let v of PageList )
    {
        // 1= Create the List with li.
        let ListChild = document.createElement("li");
        // 2= Create the link to click
        let ClickChild = document.createElement("a");

        // Special marker if the current tab is the one the user is currently in.
        // CurrentPage is defined by the site's html.
        if( v.Name === CurrentPage )
        {
            ClickChild.setAttribute( "id", "current" );
            ClickChild.href = "index.html";
            
            // Temp: Modify the coords of the logo actor because they're not left aligned.
            let divarea = document.getElementById('site-logo')

            let logo = document.createElement('img');
            
            logo.src = `../Headers/${CurrentPage}.png`
            logo.setAttribute("id","logo");
            //logo.style = `margin-left: ${v.Margin}px`;
            
            let logoclick = document.createElement('a');
            logoclick.href = "index.html"
            logoclick.appendChild(logo)
            divarea.appendChild(logoclick)

            // Also modify some of the colors in the page.
            let BG = document.body;
            let header = document.getElementsByTagName("h1");

			window.matchMedia('(prefers-color-scheme: dark)')
				.addEventListener('change', event => {
				if (event.matches) {
					BG.style = `background-color: #000`;
				} else {
					BG.style = `background-color: ${v.Color}`;
				}
			})
            if (window.matchMedia('(prefers-color-scheme: light)').matches) {
                BG.style = `background-color: ${v.Color}`;
            }
            header.style = `background: ${v.Color}; background-color: ${v.Color}`;
        } else {
            // When we're in the current page, everything else
            // is one level below.
            ClickChild.href = `../${v.Name}/index.html`;
        }

        // ClickChild.addEventListener("mouseover", event => {
        //     // event.target.style.color = "orange"
        //     event.target.setAttribute( "id", "current" );
        // }, false)
        // ClickChild.addEventListener("mouseout", event => {
        //     // event.target.style.color = "white"
        //     event.target.setAttribute( "id", v.Name === CurrentPage ? "current" : "nil" );
        // }, false)

        // 3= Create the text.
        let t = document.createTextNode( v.Name );

        // Now link them together.
        // ClickChild.href = v.Page

        if( v.Subpages )
        {
            const ListC = document.createElement("ul")

            for( let a in v.Subpages )
            {
                const dropDownItem = document.createElement("a")
                dropDownItem.textContent = a
                dropDownItem.href = `../${v.Name}/${v.Subpages[a]}`
                ListC.appendChild( dropDownItem )
            }
            ClickChild.appendChild( ListC )
        }

        ClickChild.appendChild( t );
        ListChild.appendChild( ClickChild );

        ListActor.appendChild( ListChild );
    }
    TMS.appendChild( ListActor );
}