/**
 * Recieves a string for the initial part of the Date string (YYYY-MM-DD) and creates a localized Date
 * version of said date.
 * @param {String} DateString 
 * @returns en-US version of the date.
 */
export default function( DateString )
{
	let dateCont = new Date( (DateString+"T00:00:00") )
	return dateCont.getTime() === dateCont.getTime() ? dateCont.toLocaleString("en-US", { year: 'numeric', month: '2-digit', day: '2-digit' }) : "??-??-????"
}