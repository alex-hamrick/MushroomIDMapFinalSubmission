var slideIndex = 1;
showDivs(slideIndex);

/**
 * function that sets up slideshow
 * 
 * @param {number} n number of divs in slideshow
 */
function plusDivs(n) {
  showDivs(slideIndex += n);
}

/**
 * function that edits the display setting of div in slideshow
 * 
 * @param {number} n number of divs in slideshow
 */
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
