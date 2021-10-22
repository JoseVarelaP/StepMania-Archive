import DateConv from '../js/DateConversion.js';

// Attempt loading the images, there could be the case that
// the images are not avilable at some points.
function imageExists(url, callback) {
	let img = new Image();
	img.onload = function() { callback(true); };
	img.onerror = function() { callback(false); };
	img.src = url;
}

/**
 * 
 * @param {String} convtext The bucket directory of the game version it runs on.
 * @param {String} location The direct filepath to the file.
 * @returns A converted string where it can be another site where the file can be downloaded, or a relative path from the SMArchive bucket.
 */
function CheckForHttp( convtext, location )
{
	if( String(location).includes( "http" ) )
	{
		return `${location}`;
	} else {
		return `https://objects-us-east-1.dream.io/smthemes/${convtext}/${location}`;
	}
}

const ThemeArchive = {
	Items : {},
	CreateList : function()
	{
		const container = document.getElementById('Listing');

		for( let key in this.Items )
		{
			const convtext = key.replace( "%20", " " );
			const h = document.createElement("h1")
			h.textContent = this.Items[key].Name;
			h.setAttribute( "id", key );
			container.appendChild(h)
			let t = document.createElement("table");
			
			let c = t.createTHead();
			for( let s in this.Items[key] )
			{
				const row = c.insertRow();
				let cell;

				const item = this.Items[key][s]
				if( typeof(item) === "object" )
				{
					if( item.Name )
					{
						cell = row.insertCell();
						let a = document.createElement("a");
						let p = document.createTextNode( item.Name );
						a.href = `ThemePreview.html?Category=${key}&ID=${s}`;
						a.appendChild(p);
						cell.appendChild(a);
					}

					// If the current theme has multiple releases, check if the date is included on the latest one.
					let DateString = DateConv(item.Date)
					if( typeof(item.Link) === "object" )
					{
						if( item.Link[0].Date )
							// Given it's the new version, let's append the new version alongside it.
							DateString = `${DateConv(item.Link[0].Date)}<br><small>(${item.Link[0].Name})</small>`
					}

					cell = row.insertCell();
					const dateobj = document.createElement("p");
					dateobj.innerHTML = DateString
					cell.appendChild(dateobj);

					if( item.Link )
					{
						cell = row.insertCell();
						const a = document.createElement("a");
						const p = document.createTextNode( "Available" );
						
						if( typeof(item.Link) === "object" )
						{
							a.href = CheckForHttp( convtext, item.Link[0].Link )
						} else {
							a.href = CheckForHttp( convtext, item.Link )
						}
						
						a.appendChild(p);
						cell.appendChild(a);
					}
				}

				// row.appendChild(cell);
			}
			container.appendChild(t)
		}
	},

	QuickAccessGen : function()
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
			
			// // Special marker if the current tab is the one the user is currently in.
			// if( v.Name === "Builds" )
			//	 ClickChild.setAttribute( "id", "current" );
		
			ClickChild.appendChild( t );
			ListChild.appendChild( ClickChild );
		
			ListActor.appendChild( ListChild );
		}
		ac.appendChild( ListActor );
	},

	DisplayInformation : function( Data )
	{
		const ID = Data.ID;

		const convtext = Data.Category.replace( "%20", " " );

		if( this.Items[convtext][ID] )
		{
			const ItemSet = this.Items[convtext][ID];
			
			// Update the header title
			let HeaderTitle = document.getElementById('HeaderTitle');
			HeaderTitle.textContent = ItemSet.Name;

			// Start inserting information about the theme (If available).

			if( ItemSet.Author )
			{
				let Author = document.getElementById('Author');
				Author.textContent += ItemSet.Author;
			}

			let Date = document.getElementById('Date');
			// If the current theme has multiple releases, check if the date is included on the latest one.
			let DateString = DateConv(ItemSet.Date)
			if( typeof(ItemSet.Link) === "object" )
			{
				if( ItemSet.Link[0].Date )
					DateString = DateConv(ItemSet.Link[0].Date)
			}
			Date.textContent = `Release Date: ${DateString}`;

			let s = document.getElementById("DownloadButton")
			s.textContent = "Download Now"
			s.href = CheckForHttp( convtext, ItemSet.Link );

			// If the current theme has a set of downloads (aka multiple versions), then put them on a dropdown menu,
			// so the user can choose their desired version.
			let versionchooser = document.getElementById("Version-Chooser")
			if( typeof(ItemSet.Link) === "object" )
			{
				{
					for( let i = 0; i < ItemSet.Link.length; i++ )
					{
						let linkarea = ItemSet.Link[i]
						var option = document.createElement('option');
						option.text = String(linkarea.Name);
						option.value = JSON.stringify(linkarea);
						versionchooser.add(option, null);
					}
				}

				// Since this object exists, as the multiple version table, we need to update the current chooser
				// so it can update the download button to have the latest version (which is usually stored on top).
				s.href = CheckForHttp( convtext, ItemSet.Link[0].Link )

				versionchooser.addEventListener("change", function() {
					const parse = JSON.parse(this.value)
					s.href = CheckForHttp( convtext, parse.Link );

					Date.textContent = `Release Date: ${DateConv(parse.Date)}`
					//if ( parse.Date )
					//console.log( parse )
					//s.href = `https://objects-us-east-1.dream.io/smthemes/${convtext}/${this.value}`
					//console.log(this.value)
				});
			} else {
				versionchooser.style.display = "none"
			}

			let imgdiv = document.getElementById('imageset')
			imgdiv.className = "ThemeFlexSet"
			for( let i = 1; i <= 6; i++ )
			{
				// console.log( i )
				// https://objects-us-east-1.dream.io/smthemes/StepMania5/Screenshots/Lazarus/screen0003.jpg
				let imageUrl = `https://objects-us-east-1.dream.io/smthemes/${convtext}/Screenshots/${ID}/screen${i}.png`;
				let img = document.createElement("img")
				img.style = `order: ${i}`;
				imageExists(imageUrl, function(exists) {
					// console.log( 'RESULT: url=' + imageUrl + ', exists=' + exists )
					// console.log(exists)
			if( exists )
							img.src = imageUrl;
			else
				img.remove();
				});
				imgdiv.appendChild(img);
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
	ThemeArchive.Items = data;
	// Time to send in the values that we need to generate the changelog.
	// Get the value that we have on the url.
	let UrlData = getUrlVars();
	// console.log( UrlData )

	if( UrlData.Category )
	{
		ThemeArchive.DisplayInformation( UrlData )
	} else {
		// Once we have this data, we should probably check for fallbacks.
		// Now, generate the function to obtain the data.
		ThemeArchive.CreateList()
		ThemeArchive.QuickAccessGen()
	}

	GenerateTopMenu()

	// ThemeArchive.DisplayInformation( UrlData )
}
