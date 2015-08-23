/**
This is the main namespace for the application it holds
all the methods and variable of the application.
**/
var Map = {
  
  streetView: null,
  copyright: 'Phillip Boateng',
  panoIMG: 'img_01',

  initialize: function () {

      var options;
      options = {
        pano: Map.getPano(),
        visible: true,
        panControl: true,
        zoomControl : true,
        panoProvider: Map.getPanorama
      };
      target = document.getElementById('map-canvas');

      Map.streetView = new google.maps.StreetViewPanorama(target, options);

      //Adding a click event to any DOM element with this ID
      var clickBtn = document.getElementById('clickBtn');
      google.maps.event.addDomListener(clickBtn, 'click', Map.initialize);
  },
  /*
  This function will accept the name of an image
  and set the pano to the stated name. 
  it will then trigger the clickBtn event which will
  switch the image.
  */
  selectImage: function (img){
    Map.setPano(img);//set pano as the arguement
    $( "#clickBtn" ).trigger( "click" );//switch to the selected image.
  },
  getPano: function (){
    return Map.panoIMG;
  },
  setPano: function (_panoIMG){
    Map.panoIMG = _panoIMG;
  },

  getInfo: function (){
    console.log(Map.getPano());
  },
  /**
  Gets the specified image data by its name.
  This data also has the links to the other panoramic images
  and is required to build the navigation arrows.
  **/
  getPanorama: function (pano) {
    var infoButton = document.getElementById('infoButton');
      infoButton.className = 'btn-floating disabled';
      Map.setPano(pano);
      Map.getInfo();

    if (pano == 'img_01') {
      infoButton.className = 'btn-floating disabled';

      var theReturn = {
        location: {
          pano: 'img_01',
          description: 'Main Reception'
        },
        links: [
          { pano : 'img_02', heading: 315, description : ''},
          { pano : 'img_07', heading: 45, description : ''}        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 0,
          getTileUrl: function () { return 'images/image1.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_02') {

      infoButton.className = 'btn-floating ';

      var theReturn =  {
        location: {
          pano: 'img_02',
          description: 'Lobby'
        },
        links: [
          { pano : 'img_07', heading: 90, description : ''},
          { pano : 'img_03', heading: 270, description : ''},
          { pano : 'img_01', heading: 180, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 0,
          getTileUrl: function () { return 'images/image2.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_03') {
      infoButton.className = 'btn-floating ';
      var theReturn = {
        location: {
          pano: 'img_03',
          description: 'Lobby'
        },
        links: [
          { pano : 'img_02', heading: 180, description : ''},
          { pano : 'img_06', heading: 0, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 90,
          getTileUrl: function () { return 'images/image3.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_04') {
      infoButton.className = 'btn-floating ';
      var theReturn = {
        location: {
          pano: 'img_03',
          description: 'Lobby'
        },
        links: [
          { pano : 'img_02', heading: 180, description : ''},
          { pano : 'img_06', heading: 0, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 90,
          getTileUrl: function () { return 'images/image4.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }
    if (pano == 'img_06') {
      var theReturn = {
        location: {
          pano: 'img_06',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_03', heading: 180, description : ''},
          { pano : 'img_05', heading: 90, description : ''},
          { pano : 'img_13', heading: 45, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 90,
          getTileUrl: function () { return 'images/image6.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_05') {
      var theReturn =  {
        location: {
          pano: 'img_05',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_06', heading: 180, description : ''},
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 0,
          getTileUrl: function () { return 'images/image5.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_13') {
      var theReturn =  {
        location: {
          pano: 'img_13',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_06', heading: 180, description : ''},
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 90,
          getTileUrl: function () { return 'images/image13.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_07') {
      var theReturn =  {
        location: {
          pano: 'img_07',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_01', heading: 225, description : ''},
          { pano : 'img_08', heading: 90, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 325,
          getTileUrl: function () { return 'images/image7.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_08') {
      var theReturn =  {
        location: {
          pano: 'img_08',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_07', heading: 180, description : ''},
          { pano : 'img_09', heading: 0, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 270,
          getTileUrl: function () { return 'images/image8.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_09') {
      var theReturn =  {
        location: {
          pano: 'img_09',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_08', heading: 180, description : ''},
          { pano : 'img_10', heading: 0, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 270,
          getTileUrl: function () { return 'images/image9.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_10') {
      var theReturn =  {
        location: {
          pano: 'img_10',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_09', heading: 180, description : ''},
          { pano : 'img_11', heading: 90, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 270,
          getTileUrl: function () { return 'images/image10.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_11') {
      var theReturn =  {
        location: {
          pano: 'img_11',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_10', heading: 180, description : ''},
          { pano : 'img_12', heading: 0, description : ''}
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 0,
          getTileUrl: function () { return 'images/image11.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }

    if (pano == 'img_12') {
      var theReturn =  {
        location: {
          pano: 'img_12',
          description: 'Somewhere - Reception'
        },
        links: [
          { pano : 'img_11', heading: 180, description : ''},
        ],
        copyright: Map.copyright,
        tiles: {
          centerHeading: 0,
          getTileUrl: function () { return 'images/image12.jpg' },
          tileSize: new google.maps.Size(1024, 512),
          worldSize: new google.maps.Size(1024, 512)
        }
      };
      return theReturn;
    }
    //console.log(panoIMG);

}


// function getImages (img) {
//   //grab images from the database asociated with the current pano
//   //count the images loop through, and add them to the overlay

//   //add an info div, which will change the details in the corrosponding
//   //div according to the specific pano we are on.
// }

  

}
