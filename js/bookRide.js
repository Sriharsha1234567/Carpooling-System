$( document ).ready(function() {

var updatedRide = [];

init();
function init() { 
  var tempList = '';
  $.ajax({
    type: "POST",
    url: "bookRide.php",
    dataType:"json",
    success: function(response) {
      var dataClick = [];
      var image=[];

      var d = new Date();
      for (i = 0; i < response.length; i++) {
        if(response[i].carType === "Basic Car"){
          image.push("images/basic.jpg")
          }
          else if(response[i].carType === "Premium Car"){
            image.push("images/premium.jpg")
          }
          else if(response[i].carType === "Luxury Car"){
            image.push("images/luxury.jpg")
          }
          else{
            image.push("images/basic.jpg")
          }
      }
      var userId = window.sessionStorage.getItem("userID");
      console.log(userId);
      for (i = 0; i < response.length; i++) {
        //console.log(response[i]); 
        var d1 = new Date(response[i].journeyDate);
        if((d.getDate()<=d1.getDate()) && response[i].availableSeats>0 && response[i].driverEmail != userId){
        dataClick.push(response[i].id);
        updatedRide.push(response[i])
        tempList +=  '<div class="card col-md-3" >'+ '<img class="card-img-top" src="'+image[i]+'"  alt="Card image cap">'+
        '<div class="card-body">'+
          '<h5 class="card-title">'+response[i].carType+'</h5>'+
          '<p class="card-text">'+'<b>From: </b>'+response[i].from+'</p>'+
          '<p class="card-text">'+'<b>To: </b>'+response[i].to+'</p>'+
          '<p class="card-text">'+'<b>Departure Time: </b>'+response[i].departureTime+'</p>'+
          '<p class="card-text">'+'<b>Arrival Time: </b>'+response[i].arrivalTime+'</p>'+
          '<p class="card-text">'+'<b>Journey Date: </b>'+response[i].journeyDate+'</p>'+
          '</div>'+
          '<a href = "confirmBooking.html?carId='+response[i].rideID+'" id = "bookACar" value="'+response[i].rideID+'" class="btn btn-info">'+"Book"+'</a>'+
        '</div>' + '</div>';
        }
        //tempList += '<option value="' + data[i].id + '" name="' + data[i].name +'">' + data[i].name + '</option>';            
    }
    console.log(updatedRide); 
    $("#getRideDetails").html(tempList);
    window.sessionStorage.setItem("RideDetails", JSON.stringify(updatedRide));
    }
});
}


});