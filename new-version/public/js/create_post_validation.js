/**.===================================.
 * | CREATE POST JAVASCRIPT VALIDATION |
 * '==================================='
 * 
 * This JavaScript code was written by Shawn Hatten, 666223.
 * Resources used:
 * regexr: https://regexr.com for providing an environment to create the regex expressions used in the validation
 * W3Schools: https://www.w3schools.com/js/default.asp for providing excellent documentation and an online JS environment
 */
const form = document.forms.createForm;
console.log(form);
if (form) {
    console.log('Create Post Validator up and running :)')
    form.addEventListener('submit', validateForm);
} else {
    console.error('Unable to find the create post form; no validation will be performed');
}

function resetForm() {
    for (i = 0; i < 5; i++){
        form[i].value = null;
    }
    document.getElementById("error").innerText = ""
}

function validateForm(event) {

    if(form[0].value.length < 1) {
        document.getElementById("error").innerText = "Title cannot be blank"
        event.preventDefault();
    }
    else if(form[0].value.length > 80) {
        document.getElementById("error").innerText = "Title cannot exceed 80 characters"
        event.preventDefault();
    }
    else if(form[1].value.length < 1) {
        document.getElementById("error").innerText = "At least 1 Tag/Keyword is required"
        event.preventDefault();
    }
    else if(form[2].value.length < 1) {
        document.getElementById("error").innerText = "Content cannot be blank"
        event.preventDefault();
    }

}