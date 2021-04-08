var today = new Date();
var hourNow = today.getHours();
var greeting;

if (hourNow > 18) {
    greeting = 'Good evening!';
} else if (hourNow > 12) {
    greeting = 'Good afternoon!';
} else if (hourNow > 0) {
    greeting = 'Good morning!';
} else {
    greeting = 'Welcome!';
}

//document.write('<h3>' + greeting + '</h3>');

 let newEl = document.createElement('h3'); //creates h3

 newEl.appendChild(document.createTextNode(greeting)); 
 //inserts greeting in h3

let ref = document.querySelector('h1'); //finds the h1 so we can refer to its location in the DOM

/*
* function to insert a element to the DOM referencing a specific location
*@param el : element to be inserted
*@parm referenceNode : element to be referenced
*/

function insertAfter(el, referenceNode) {
    referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling);
}

//calls function to run with these arguments
insertAfter(newEl, ref);


