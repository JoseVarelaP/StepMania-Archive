let PageList = [
	{ Name: 'Announcers', /* Margin: -8, */ Color: '#227700' },
	{
		Name: 'Builds', /* Margin: -130, */ Color: '#F1CD00',
		Subpages: { "Builds Listing": "index.html", "Credits": "Credits.html" }
	},
	{ Name: 'NoteSkins', /* Margin: -70, */ Color: '#772200' },
	{
		Name: 'Themes', /* Margin: -91, */ Color: '#001177',
		Subpages: {
			"Theme List": "index.html",
			"Theme Update (WIP)": "ThemeUpdate.html"
		}
	},
	{ Name: 'Characters', /* Margin: -20, */ Color: '#772200' },
	{ Name: 'Footage', /* Margin: -130, */ Color: '#550055' },
	{
		Name: 'Tools', /* Margin: -250, */ Color: '#005599',
		Subpages: {
			"Tools List": "index.html",
			"Font Conversion Guide": "FontConversionGuide.html"
		}
	},
	{ Name: 'About', /*Margin: -50,*/ Color: '#002211' },
]

let TMS = document.getElementById('top-menu');

/**
 * The pages contain a message to verify that Javascript is not enabled, and that it must be enabled
 * to visit the site. This check will verify this process by removing it (if it is available).
 */
function CheckJavascriptMessage() {
	let jv = document.getElementById("JavaMessage");
	if (jv !== null)
		jv.remove()
}

/**
 * Just a simplified version because it can get messy.
 * @param {string} IconPath Where's the icon?
 * @param {string} Link Where will it go to?
 * @returns clickable link with image object inside.
 */
function GenerateIconWithLink(IconPath, Link) {
	let IconLink = document.createElement('a');
	let IconGraphic = document.createElement('img');

	IconLink.href = Link;
	IconGraphic.src = IconPath;
	IconGraphic.setAttribute("id", "toprighticon");
	IconLink.appendChild(IconGraphic);

	return IconLink;
}

function TemporaryShortageWarning( incidentID )
{
	const MoreInfoSite = `https://www.dreamhoststatus.com/pages/incident/${incidentID}`;
	const Container = document.createElement("div");
	Container.className = "ShortageMessage";
	const WarningText = document.createElement("p");
	WarningText.innerHTML = `&#9888; The archive's bucket provider is currently experiencing an outage. For more information, <a href='${MoreInfoSite}'>please visit this page.</a>`;
	WarningText.innerHTML = WarningText.innerHTML + "<br>Due to this, images from the site and big downloads may fail to complete.<p></p>";
	Container.appendChild( WarningText );
	return Container;
}

function GenerateTopMenu() {
	// Since we already know that JS is enabled, remove the message.
	CheckJavascriptMessage()

	let ListActor = document.createElement("div");
	ListActor.className = "PageList"
	//TMS.appendChild( TemporaryShortageWarning("575f0f606826303142000510/60c7b83ddc340e0537a84542") );

	TMS.appendChild(GenerateIconWithLink("../static/discord_icon.png", "https://discord.gg/uMkVUrr"));
	TMS.appendChild(GenerateIconWithLink("../static/GitHub-Mark-Light-120px-plus.png", "https://github.com/JoseVarelaP/StepMania-Archive"));


	for (let v of PageList) {
		// 1= Create the List with li.
		let ListChild = document.createElement("li");
		// 2= Create the link to click
		let ClickChild = document.createElement("a");

		// Special marker if the current tab is the one the user is currently in.
		// CurrentPage is defined by the site's html.
		if (v.Name === CurrentPage) {
			ClickChild.setAttribute("id", "current");
			ClickChild.href = "index.html";

			// Temp: Modify the coords of the logo actor because they're not left aligned.
			let divarea = document.getElementById('site-logo')

			let logo = document.createElement('img');

			logo.src = `../Headers/${CurrentPage}.png`
			logo.setAttribute("id", "logo");
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

		// 3= Create the text.
		let t = document.createTextNode(v.Name);

		if (v.Subpages) {
			const ListC = document.createElement("ul")

			for (let a in v.Subpages) {
				const dropDownItem = document.createElement("a")
				dropDownItem.textContent = a
				dropDownItem.href = `../${v.Name}/${v.Subpages[a]}`
				ListC.appendChild(dropDownItem)
			}
			ClickChild.appendChild(ListC)
		}

		ClickChild.appendChild(t);
		ListChild.appendChild(ClickChild);

		ListActor.appendChild(ListChild);
	}
	TMS.appendChild(ListActor);
}