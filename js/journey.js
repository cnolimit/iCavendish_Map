/*******************************************************
*
* ELEMENT ANIMATIONS
*
*******************************************************/

//Overlay button function open anc close side panel
$(function(){

  $(".btnMap").click(function(){
    $("#journey_box").animate({width:'toggle'},550);
  });

  $(".mdi-hardware-keyboard-backspace").click(function(){
    $("#journey_box").animate({width:'toggle'},550);
  });

});

$(function () {
    $(".btnMap").click(function () {
        if($(this).parent().css("right") == "-280px"){
        $(this).parent().animate({right:'0px'}, {queue: false, duration: 500});
    }else {
        $(this).parent().animate({right:'-280px'}, {queue: false, duration: 500});}
    });
});



//Hide snd display the journey planner option
$(function(){
  var search_bar = document.getElementById('search_bar');
  $("#plan").click(function(){
    $( "#search_bar" ).animate({
      marginTop: "+=500"
    }, 50, function() {
      // Animation complete.
      document.getElementById("search_bar").style.display = "none";
      $("#search_bar").animate({marginTop:'-=500'},550);
    });

    $("#journeyForm").animate({display:'toggle'},550);
  });
});

$(function(){
  var journeyForm = document.getElementById('search_bar');
  //making search form fly out
  $("#plan2").click(function(){
    $( "#journeyForm" ).animate({
      marginTop: "+=500"
    }, 50, function() {
      // Animation complete.
      document.getElementById("journeyForm").style.display = "none";
      $("#journeyForm").animate({marginTop:'-=500'},550);

    });

    $("#search_bar").animate({display:'toggle'},550);
  });
});

$(function(){
  var journeyForm = document.getElementById('search_bar');
  //making search form fly out
  $(".hide").click(function(){
    $( "#journeyForm" ).animate({
      marginTop: "+=500"
    }, 50, function() {
      // Animation complete.
      document.getElementById("journeyForm").style.display = "none";
      $("#journeyForm").animate({marginTop:'-=500'},550);

    });
    document.getElementById("journ").innerHTML = " ";
    $(".hide").hide();
    $("#search_bar").animate({display:'toggle'},550);
  });
});


/*******************************************************
*
* JOURNEY PLANNER SCRIPT
*
*******************************************************/
//turn this into a class

    var count = 0;
    var subCount = 0;
    var posting = null;
    var returnData = {};
    var DirectionCount = 0;

      function getPath(){

        // Attach a submit handler to the form
        $( "#journeyForm" ).submit(function( event ) {
          // Stop form from submitting normally
          event.preventDefault();
        });

        //grab the values from start and end point
        var from = document.getElementById('start').value;
        var to = document.getElementById('end').value;
        var overlayImgContainer = document.getElementById('overlayImgContainer');
        var journ = document.getElementById("journ");


        //Calculating the shortest path of the given values
        var journeyImages = Routes.shortestPath(""+from+"", ""+to+"").concat([""+from+""]).reverse();
        
        console.log(journeyImages);
        console.log(count);
        

        if (count < journeyImages.length) {
          // appending current location to next image to search again the
          // the database.
          var path = journeyImages[count]+journeyImages[(count+1)];

          //passing current image and the the path variable 
          getImage(journeyImages[count], path);

          journ.innerHTML = "";
          count++; //increment counter
          getPath(); //recursivley call the function
          subCount = subCount+1;//increment subcount
        }else{
          // $( "#subpl2" ).trigger( "click" );
        }
        if (count == journeyImages.length) {

          //Reseting all values
          count = 0;
          overlayImgContainer.innerHTML = " ";
          processResponse();
          returnData = {};
          DirectionCount = DirectionCount +1;
          //window.location.reload(true);
          
        //virtualTour();
        };
      }

      //runs through array and displays image with description in order
      function processResponse(){
        for(var key in returnData){

          //collecting the data in ref to identifier
          var data = returnData[key+""];

          //Splitting up the values to send through
          //to load images
          var newData = data.split(",");
          var img = newData[0];
          var panoVal = newData[1];
          var title = newData[2];
          var Direction = newData[3];

          if (Direction != "" && DirectionCount%2 == 1 || subCount == 5) {
            //Appending journey to the planner
            $( "#journ" ).append( "<div id='pathDirection'>"+ getIcon(Direction)+"   "+ Direction +"<div>" );
          };

          if (subCount > 1) {
            //show preloader
            $('#journeyForm').hide();
            $('.pre-circle').show(0).delay(300).hide(0).promise().then(function(){
                 $('.hide').delay(300).show('slow');
                 $('#journ').delay(300).show('slow');
                 subCount = 0;
            });
            // $('#journ').show(0).delay(500);
          };

          //Load the image into the overlay
          loadImage(img,panoVal,title);
        }

      }

       function virtualTour(){
        for(var key in returnData){

          //collecting the data in ref to identifier
          var data = returnData[key+""];

          //Splitting up the values to send through
          //to load images
          var newData = data.split(",");
          var panoVal = newData[1];
          console.log(panoVal);
          setTimeout(Map.selectImage(panoVal), 5000);
        }

      }



      function getImage (image, path) {  

         // Send the data using post
        posting = $.post( "planJourney.php", { journeyImages: image, id:count, path:path } );

        posting.done(function( data ) {
        //Dividing the data by its deliminator
        var newData = data.split(",");
          //Adding the identifier to the array
          returnData[newData[newData.length-1]+""] = data; 
        });

      }

      function loadImage(img, panoVal, title) {
        var overlay = document.getElementById('overlay');
        Overlay.setImage(img, overlay, panoVal,title);
        if (Overlay.overlayHide) {
          $( "#pull_tab" ).trigger( "click" );
        };
      }

      // checks the text sent through the function to see
      // if it contains specific words, in order to return
      // a navigational icon.
      function getIcon(directionText){
        var STRAIGHT = "<i class='fa fa-arrow-up'></i>";
        var RIGHT = "<i class='fa fa-arrow-right'></i>";
        var LEFT = "<i class='fa fa-arrow-left'></i>";
        var TEXT = directionText.toUpperCase();

        var straightCount = TEXT.indexOf("STRAIGHT");
        if (straightCount >= 0){
          return STRAIGHT;
        }
        var rightCount = TEXT.indexOf("RIGHT");
        if (rightCount >= 0){
          return RIGHT;
        }
        var leftCount = TEXT.indexOf("LEFT");
        if (leftCount >= 0){
          return LEFT;
        }

      }