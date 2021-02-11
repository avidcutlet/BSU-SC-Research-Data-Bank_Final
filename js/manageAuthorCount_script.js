//////////////////////////////////////////////////////
// This script is for appending and removing author //
// ///////////////////////////////////////////////////


// Counter for author
var authorCount = 0;

// Parent Element Tag Author (PET-author)
var petAuthor = document.getElementById("PET-author");

// Add author input
function appendAuthor(){

    // Author set (Forename, MI, and Surname)
    var authorSet = document.getElementById("author-set");

    // Last tag of PET author
    var lastTag = petAuthor.lastElementChild;

    // Maximum of 5 author can be appended
    if (authorCount <= 4){

        // Clone author set
        var clone = authorSet.cloneNode(true);

        // Insert clone after itself
        $(clone).insertAfter(lastTag).find("input[type='text']").val("");

        // Counter
        authorCount++;
    }

}

// Remove author input
function removeAuthor(){

    
    // Minimum of 1 author should remain 
    if (authorCount >= 1){

        // Remove last element child of PET author
        petAuthor.lastElementChild.remove();

        // Counter
        authorCount--;
    }


}

function getValues(){

    // Get authors inside PET-author
    var inputs = petAuthor.getElementsByTagName("input");

    // Get values through loop
    for ($i = 0; $i < inputs.length; $i++){

        // Get value here
        // console.log(inputs[$i].value);

        // or create your own that you think will suit your taste...
    }



}