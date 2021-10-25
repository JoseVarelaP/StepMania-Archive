function updateElements(page, deep) {
    const language = window.localStorage.getItem('definedLanguage') || 'en'
    const requestURL = `../${'../'.repeat(deep || 0)}script/languages/${language}.json`
    const request = new XMLHttpRequest()
    request.open('GET', requestURL)
    request.responseType = 'json'
    request.send()
    request.onload = function() {
        const data = request.response
        const pageLines = data[page]
        const elementsToTranslate = document.querySelectorAll('[data-translation]')
        
        for (let i = 0; i < elementsToTranslate.length; i++) {
            const currentElement = elementsToTranslate[i]
            const translatedString = pageLines[currentElement.getAttribute('data-translation')]

            if (!translatedString) continue

            if (translatedString.includes('INNER_HTML')) {
                currentElement.innerHTML = translatedString.replace('INNER_HTML', '')
            } else {
                currentElement.innerText = pageLines[currentElement.getAttribute('data-translation')]
            }
        }
    }
}

updateElements(
    document.currentScript.getAttribute('page'), 
    document.currentScript.getAttribute('deep') ? parseInt(document.currentScript.getAttribute('deep')) : undefined
)