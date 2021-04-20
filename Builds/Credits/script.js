const Credits = {
    data: {},
    Generate: (data) => {
        const creditsContent = document.getElementById( 'creditsContent' )

        for (let i = 0; i < Object.keys(data).length; i++) {
            const game = data[Object.keys(data)[i]]
            const gameElem = document.createElement( 'div' )
            const gameImg = document.createElement( 'img' )
            gameImg.setAttribute( 'name', Object.keys(data)[i] )
            gameImg.setAttribute( 'id', Object.keys(data)[i] )
            gameImg.setAttribute( 'src', `./Credits/${Object.keys(data)[i]}Logo.png` )
            gameImg.style.width = '300px'

            gameElem.appendChild( gameImg )

            const gameSpacing = document.createElement('br')
            creditsContent.appendChild( gameSpacing )
            creditsContent.appendChild( gameSpacing )
            for (let t = 0; t < game.length; t++) {
                const dataTitle = game[t].title
                const title = document.createElement('strong')
                const titleText = document.createElement('h1')
                titleText.style.margin = "5px 5px 5px -5px"

                // titleText.style.color = 'lightgreen'
                titleText.innerHTML = dataTitle
                title.appendChild( titleText )
                gameElem.appendChild( title )

                if (game[t].members.length >= 1) {
                    for (let m = 0; m < game[t].members.length; m++) {
                        const memberName = game[t].members[m]
                        const memberElem = document.createElement( 'p' )
                        memberElem.innerHTML = memberName
                        gameElem.appendChild( memberElem )
                    }
                }

                creditsContent.appendChild( gameElem )
            }
        }
    }
}

let requestURL = './Credits/data.json'
let request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
    const data = request.response;
    Credits.Generate( data );
    GenerateTopMenu()
}