function signOutOverlay() {
    document.getElementById('signoutOverlay').style.display = 'flex';    
}

function closeSignOutOverlay() {
    document.getElementById('signoutOverlay').style.display = 'none';
}

function settingsOverlay() {
    document.getElementById('settingsOverlay').style.display = 'flex';    
}

function closeSettingsOverlay() {
    document.getElementById('settingsOverlay').style.display = 'none';
}

window.onload = function() {
  if (window.location.hash === "#start") {
    settingsOverlay();
  }
};