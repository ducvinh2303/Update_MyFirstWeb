/**.======================.
 * | ARCHIVE POST MANAGER |
 * '======================'
 * 
 * This JavaScript code was written by Shawn Hatten, 666223.
 * Resources used:
 * regexr: https://regexr.com for providing an environment to create the regex expressions used in the validation
 * W3Schools: https://www.w3schools.com/js/default.asp for providing excellent documentation and an online JS environment
 */

let archive_contents = new Array('1','2','3','4','5')
let archive_visible = new Array(true, true, true, true, true)

for (a = 0; a < 5; a++){
    archive_contents[a] = document.getElementsByClassName("blog-content")[a]
}

function togglePostVisibility(postID) {
    archive_visible[postID-1] = !archive_visible[postID-1]
    document.getElementsByClassName("blog-content")[postID-1].children[0].hidden = archive_visible[postID-1]
    document.getElementsByClassName("archive-expand")[postID-1].children[0].innerHTML = archive_visible[postID-1] ? "Expand" : "Shrink" 

}