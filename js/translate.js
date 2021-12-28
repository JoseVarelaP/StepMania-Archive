/**
 * The language that will fallback to if no language is defined on localStorage.
 */
const _DEFAULT_LANGUAGE = 'en'

/**
 * Translates all elements in the page.
 * @param {string} page - The folder name of where the page is in, in lowercase.
 * @param {string} deep - How deep the page file. Number inside the string.
 */
function updateElements(page, deep) {
    const language = window.localStorage.getItem('definedLanguage') || _DEFAULT_LANGUAGE
    const requestURL = `../${'../'.repeat(deep || 0)}js/languages/${language}.json`
    const request = new XMLHttpRequest()
    request.open('GET', requestURL)
    request.responseType = 'json'
    request.send()
    request.onload = function() {
        const data = request.response
        const pageLines = data[page]
        const elementsToTranslate = document.querySelectorAll('[data-translation]')
        console.log(`Loaded lines for ${page}.${deep ? ` Deep level is ${deep}` : '' }`)
        for (let i = 0; i < elementsToTranslate.length; i++) {
            const currentElement = elementsToTranslate[i]
            const translatedString = pageLines[currentElement.getAttribute('data-translation')]

            if (!translatedString) continue

            if (translatedString.includes('INNER_HTML')) {
                currentElement.innerHTML = translatedString.replace('INNER_HTML', '')
                continue
            }

            if (translatedString.includes('CHILD_NODE')) {
                currentElement.childNodes[0].childValue = translatedString.replace('CHILD_NODE', '')
                continue
            }

            currentElement.innerText = pageLines[currentElement.getAttribute('data-translation')]
        }
    }
}

updateElements(
    document.currentScript.getAttribute('page'), 
    document.currentScript.getAttribute('deep') ? parseInt(document.currentScript.getAttribute('deep')) : undefined
) 