// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
var backTopBtn = document.getElementById("backTopBtn");

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    backTopBtn.style.opacity = 1;
  } else {
    backTopBtn.style.opacity = 0;
  }
}

// When the user clicks on the button, scroll to the top of the document
function backTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function toggleMuteVideo() {
  const videoContainer = document.getElementById('videoContainer');
  const video = videoContainer.querySelector('video');
  const soundBtn = document.getElementById('soundIcon');
  if (video.muted === true) {
    // toggle mute video
    video.muted = false;
    // change state sound icon
    soundBtn.src = './static/svg/icon-unmuted.svg';
  } else if (video.muted === false) {
    // toggle mute video
    video.muted = true;
    // change state sound icon
    soundBtn.src = './static/svg/icon-muted.svg';
  }
}