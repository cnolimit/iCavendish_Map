/**
This is the main namespace for the application it holds
all the methods and variable of the application.
**/
var Overlay = {

  overlayHide: false,
  descriptionOpen: false,

  createOverlay: function () {

      //Create the map overlay
      window.overlay = document.createElement('div');
      window.innerOverlay = document.createElement('div');
      window.openClose = document.createElement('div');
      window.iTag = document.createElement('i');

      openTab = document.getElementById('pull_tab');

      //setting id for elements
      innerOverlay.id = 'innerOverlay';
      overlay.id = 'overlay';
      openClose.id = 'openClose';
      iTag.id = 'iTag';

      //setting classname for elements
      iTag.className = 'fa fa-close';

      //info button elements
      window.overlayImgContainer = document.createElement('div');
      window.infoButtonDiv = document.createElement('div');
      window.infoButton = document.createElement('a');
      window.infoIcon = document.createElement('i');

      //info classes and ID's
      overlayImgContainer.id = 'overlayImgContainer';
      infoButton.className = 'btn-floating';
      infoIcon.className = 'mdi-action-info ';
      infoButton.id = 'infoButton';
      infoButton.id ='infoButton';
      infoButtonDiv.id = 'infoButtonDiv';

      //div appendencies
      infoButton.appendChild(infoIcon);
      infoButtonDiv.appendChild(infoButton);
      overlay.appendChild(infoButtonDiv);

      var descriptionOverlay = document.getElementById('descriptionOverlay');
      var btnClose = document.getElementById('btnClose');
      descriptionOpen =false;

      //Click event to open the information overlay
      infoIcon.addEventListener('click', function (event) {

        $(descriptionOverlay).animate({top: '72%'},400);
        $(descriptionOverlay).fadeIn({display: 'block'},100);
        $(descriptionOverlay).animate({top: '20%'},400);

      });

      //Click event to close the information box
      btnClose.addEventListener('click', function (event) {
              $(descriptionOverlay).animate({top: '72%'},400);
              $(descriptionOverlay).fadeOut({display: 'hide'},100);
        });


      //Click event to open the overlay
      openTab.addEventListener('click', function (event) {
            
            $(overlay).fadeIn({display: 'none'},100);
            $(overlay).animate({top: '97%'},200);
            $(overlay).animate({top: '55%'},400);
            $(overlay).animate({top: '72%'},400);

            $( openTab ).toggle( "slow", function() {
              $(openTab).animate({display: 'none'},400);
              $(openTab).animate({marginLeft: '0%'},400);
            });

            //openClose.style.display = 'block';
            $(openClose).fadeIn('slow');

            return overlayHide = false;

        });

      //click event to close the overlay
      openClose.addEventListener('click', function (event) {

            $(overlay).animate({top: '65%'},400);
            $(overlay).animate({top: '55%'},400);
            $(overlay).animate({top: '97.1%'},400);
            $(overlay).fadeOut({display: 'block'},100);

            $( openTab ).toggle( "slow", function() {
              $(openTab).animate({marginLeft: '50%'},400);
              $(openTab).animate({display: 'block'},400);
            });

            //openClose.style.display = 'none';
            $(openClose).fadeOut('slow');

            return overlayHide = true;
              
       });

      openClose.innerHTML = 'x'; //adds the x in the div
      overlay.appendChild(openClose);
      overlay.appendChild(overlayImgContainer);


      document.body.appendChild(overlay);
      //Overlay.setImage('images/image1.jpg', overlay, 'img_01', 'Front Desk');
  },

  /*
  This funciton will create an img element that will
  sit inside an anchor 
  */
  setImage: function (img, overlay, panoVal, description) {

    window.imgContainer = document.createElement('div');
    window.firstImg = document.createElement('img');
    window.imgText = document.createElement('div');

    //Setting ID's of new elements
    imgText.id = 'imgText';
    firstImg.id = 'firstImg';
    imgContainer.id = 'imgContainer';

    //Setting Attribute of the image 
    firstImg.setAttribute('src',img)
    imgText.innerHTML = description;

    //Setting click event function
    firstImg.onclick = function () { Map.selectImage(panoVal); };

    //Place the image and its overlay description bar
    //inside the container.
    imgContainer.appendChild(firstImg);
    imgContainer.appendChild(imgText);

    //Put the container with all the images inside the overlay
    overlayImgContainer.appendChild(imgContainer);

  }

// function getImages (img) {
//   //grab images from the database asociated with the current pano
//   //count the images loop through, and add them to the overlay

//   //add an info div, which will change the details in the corrosponding
//   //div according to the specific pano we are on.
// }


}
