
//var data = window.localStorage.getItem('Book');
//var main = JSON.parse(data);

init();

function init() {
      $.ajax({
        type: "POST",
        url: "bookRide.php",
        dataType:"json",
        success: function(main) {
            var number = getUrlVars()["carId"];
            var result;
            for(var i =0;i<main.length;i++){
                if(number==main[i].rideID){
                    result = main[i];
                }
            }
            console.log(result);
            var image = []
            if(result.carType === "Basic Car"){
                image.push("images/basic.jpg")
                }
                if(result.carType === "Premium Car"){
                  image.push("images/premium.jpg")
                }
                if(result.carType === "Luxury Car"){
                  image.push("images/luxury.jpg")
            }
            
            var tempList = '';
            tempList =  '<div class="card" >'+ '<img class="card-img-top" src="'+image[0]+'" width="1px" alt="Card image cap">'+
            '<div class="card-body">'+
              '<h5 class="card-title">'+result.carType+'</h5>'+
              '<p class="card-text">'+'<b>From: </b>'+result.from+'</p>'+
              '<p class="card-text">'+'<b>To: </b>'+result.to+'</p>'+
              '<p class="card-text">'+'<b>Departure Time:: </b>'+result.departureTime+'</p>'+
              '<p class="card-text">'+'<b>Arrival Time: </b>'+result.arrivalTime+'</p>'+
              '<p class="card-text">'+'<b>Journey Date: </b>'+result.journeyDate+'</p>'+
              '</div>'+
              '<a href = "bookRide.html" id = "bookACar" value="'+result.id+'" class="btn btn-primary">'+"Back"+'</a>'+
            //'<button id = "bookACar'+data[i].id+'" value="'+data[i].id+'" onClick="'+bookCar(data[i].id)+'" class="btn btn-primary">'+"Book"+'</button>'+
            '</div>' + '</div>';
            
            var selectList = ''
            for (var x = 1; x <= result.availableSeats; x++) {
                selectList += '<option>' + x + '</option>';
            }
            
            $('#selectNoOfSeats').html(selectList);
            $("#getRideDetails").html(tempList);
            $("#driverName").html(result.driverName);
            $("#contactNumber").html(result.contactNumber);
            $("#availableSeats").html(result.availableSeats);
            $("#price").html(result.fare);
            
            window.localStorage.setItem('rideID', result.rideID);

            //This is used to calculate the total fare of the ride.
            var totalPrice = 0;
            $('#selectNoOfSeats').click(function(){
            totalPrice = 0;
            var noofSeats = $(this).val();
            if(noofSeats !== "Choose No.of Seats"){
            totalPrice += result.fare * noofSeats;
            $("#totalPrice").html(totalPrice+"$ this ride");
            }
            else{
            $("#totalPrice").html("");
            }
            });
            

            // This is the confirm ride details action.
            var bookedRideDetails = []
            $('#onConfirm').click(function(){
            
            console.log("inside the confirm button");
            bookedRideDetails.push({bookedCarType:result.carType,bookedFrom:result.from,bookedTo:result.to,bookedCarImage:image[0],
            bookedTotalPrice:totalPrice,seats:result.availableSeats,bookedTotalSeats:$('#selectNoOfSeats').val(),bookedDriverContactNumber:result.contactNumber,
            bookedDeparture:result.departureTime,bookedArrival:result.arrivalTime,bookedJourneyDate:result.journeyDate,bookedDriverName:result.driverName});
            window.localStorage.setItem('Booked', JSON.stringify(bookedRideDetails));
            var remainingSeats = result.availableSeats - $('#selectNoOfSeats').val();
            console.log(bookedRideDetails)
            console.log(remainingSeats);
            $.ajax({
              type:"POST",
              url:"updateSeats.php",
              data:{ rideID: result.rideID,remainingSeats:remainingSeats},
              success:function (result) {
              window.location.href = "bookingSuccess.html";
              }
  
          });
            
            });
        }
});
}


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
return vars;
}
//var number = getUrlVars()["carId"];
//console.log(number);

// for(var i =0;i<main.length;i++){
//     // console.log(data[i]);
//     if(number==main[i].rideID){
//         result = main[i];
//     }
// }

// console.log(result);

// var tempList = '';
// tempList =  '<div class="card" >'+ '<img class="card-img-top" src="'+result.image+'" width="1px" alt="Card image cap">'+
// '<div class="card-body">'+
//   '<h5 class="card-title">'+result.carType+'</h5>'+
//   '<p class="card-text">'+'<b>From: </b>'+result.from+'</p>'+
//   '<p class="card-text">'+'<b>To: </b>'+result.to+'</p>'+
//   '<p class="card-text">'+'<b>Departure Time:: </b>'+result.Departure+'</p>'+
//   '<p class="card-text">'+'<b>Arrival Time: </b>'+result.Arrival+'</p>'+
//   '<p class="card-text">'+'<b>Journey Date: </b>'+result.journeyDate+'</p>'+
//   '</div>'+
//   '<a href = "bookRide.html" id = "bookACar" value="'+result.id+'" class="btn btn-primary">'+"Back"+'</a>'+
// //'<button id = "bookACar'+data[i].id+'" value="'+data[i].id+'" onClick="'+bookCar(data[i].id)+'" class="btn btn-primary">'+"Book"+'</button>'+
// '</div>' + '</div>';

// var selectList = ''
// for (var x = 1; x <= result.availableSeats; x++) {
//     selectList += '<option>' + x + '</option>';
// }

// $('#selectNoOfSeats').html(selectList);
// $("#getRideDetails").html(tempList);
// $("#driverName").html(result.driverName);
// $("#contactNumber").html(result.contactNumber);
// $("#availableSeats").html(result.availableSeats);
// $("#price").html(result.price);


// var totalPrice = 0;
// $('#selectNoOfSeats').click(function(){
// totalPrice = 0;
// var noofSeats = $(this).val();
// if(noofSeats !== "Choose No.of Seats"){
// totalPrice += result.price * noofSeats;
// $("#totalPrice").html(totalPrice+"$ this ride");
// }
// else{
// $("#totalPrice").html("");
// }
// });

// var bookedRideDetails = []
// $('#onConfirm').click(function(){
// console.log("inside the confirm button");

// bookedRideDetails.push({bookedCarType:result.carType,bookedFrom:result.from,bookedTo:result.to,bookedCarImage:result.image,
// bookedTotalPrice:totalPrice,bookedTotalSeats:$('#selectNoOfSeats').val(),bookedDriverContactNumber:result.contactNumber,
// bookedDeparture:result.Departure,bookedArrival:result.Arrival,bookedJourneyDate:result.journeyDate,bookedDriverName:result.driverName});

// console.log(bookedRideDetails)
// window.localStorage.setItem('Booked', JSON.stringify(bookedRideDetails));
// window.location.href = "bookingSuccess.html";
// });


