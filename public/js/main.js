var myText = document.getElementById('forum-description');
var maxLength = 300; // ubah nilai ini sesuai kebutuhan
if (myText.innerHTML.length > maxLength) {
  myText.innerHTML = myText.innerHTML.substring(0, maxLength) + '...';
}