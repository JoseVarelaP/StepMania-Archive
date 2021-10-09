/**
* Operation to sort the dates based on their Date object.
* Could likely be improved.
* @param {HTMLTableElement} table 
* @param {number} dateindex - Column where the dates are located.
*/
export default function( table, dateindex ) {
	// Before doing anything, check if there's an actual Date row in this.
	if( !table.rows[0].innerHTML.includes("Date") )
		return
	
	var rows = Array.from(table.rows);
	// Erase the original table
	table.innerHTML = ""
	
	rows.sort(function(a,b) {
		const at = new Date( a.cells[dateindex].textContent )
		const bt = new Date( b.cells[dateindex].textContent )
		return at.getTime() - bt.getTime()
	});

	//table.appendChild(rows)
	rows.forEach(function(v) {
		table.appendChild(v);
	});
}