document.addEventListener("DOMContentLoaded", function() {
  var selectedSeats = JSON.parse(sessionStorage.getItem("selectedSeats")) || [];
  var selectedSeatsElement = document.getElementById("selected-seats");

  if (selectedSeats.length > 0 && selectedSeatsElement) {
    selectedSeatsElement.textContent = selectedSeats.join(", ");
  }
  
  var resetButton = document.querySelector(".riset");
  if (resetButton) {
    resetButton.addEventListener("click", function() {
      sessionStorage.removeItem("selectedSeats");
      selectedSeatsElement.textContent = "";
    });
  }
});

document.addEventListener("click", function(event) {
  if (event.target.tagName.toLowerCase() === "a") {
    var seatElement = event.target.closest(".seat");
    if (seatElement) {
      var id = seatElement.id;
      var selectedSeats = JSON.parse(sessionStorage.getItem("selectedSeats")) || [];

      if (selectedSeats.includes(id)) {
        selectedSeats = selectedSeats.filter(function(seat) {
          return seat !== id;
        });
      } else {
        selectedSeats.push(id);
      }

      sessionStorage.setItem("selectedSeats", JSON.stringify(selectedSeats));
    }
  }
});
