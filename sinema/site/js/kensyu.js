document.addEventListener("DOMContentLoaded", function() {
  var selectedSeats = JSON.parse(sessionStorage.getItem("selectedSeats")) || [];
  var seatIdElement = document.getElementById("zaseki");

  if (selectedSeats.length > 0 && seatIdElement) {
    seatIdElement.textContent = selectedSeats.join(", ");
  }

  var resetButton = document.querySelector(".riset");
  if (resetButton) {
    resetButton.addEventListener("click", function() {
      sessionStorage.removeItem("selectedSeats");
      seatIdElement.textContent = ""; // リセット後に表示をクリア
    });
  }
});
