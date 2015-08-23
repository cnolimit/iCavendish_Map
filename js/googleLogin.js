  var user;
  var isLoggedIn;

	function onSignIn(googleUser) {
	  var profile = googleUser.getBasicProfile();
	  console.log('ID: ' + profile.getId());
	  console.log('Name: ' + profile.getName());
	  console.log('Image URL: ' + profile.getImageUrl());
	  console.log('Email: ' + profile.getEmail());

    document.getElementById('avImg').src = profile.getImageUrl();
    setUser(googleUser);
    isLoggedIn = googleUser.isSignedIn();
	}

  function getUser () {
    return user;
  }
  function setUser (googleUser) {
    user = googleUser;
  }

	function signOut() {
	  user.disconnect().then(function () {
	    console.log('User signed out.');
	  });
	}

  function LoggedIn () {
    if (isLoggedIn == true) {
      return true;
    }else{
      return false;
    }
  }
  