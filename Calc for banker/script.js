$(document).ready(function() {
    $("#calculate").click(function() {
      const principal = parseFloat($("#principal").val());
      const rate = parseFloat($("#rate").val());
      const time = parseFloat($("#time").val());
  
      const simpleInterest = (principal * rate * time) / 100;
      const totalAmount = principal + simpleInterest;
  
      $("#result").html(`Simple Interest: ₹${simpleInterest.toFixed(2)}<br>Total Amount: ₹${totalAmount.toFixed(2)}`);
    });
    $("#calculateEMI").click(function() {
      const loanAmount = parseFloat($("#principal").val().trim());
      const loanRate = parseFloat($("#rate").val().trim()) / 100 / 12; // Monthly rate
      const loanTenure = parseFloat($("#time").val().trim());
  
      if (isNaN(loanAmount) || isNaN(loanRate) || isNaN(loanTenure)) {
        $("#result").html("Please enter valid numeric values.");
      } else if (loanAmount <= 0 || loanRate <= 0 || loanTenure <= 0) {
        $("#result").html("Please enter positive values for loan amount, interest rate, and loan tenure.");
      } else {
        const denominator = Math.pow(1 + loanRate, loanTenure) - 1;
  
        if (denominator === 0) {
          $("#result").html("Loan tenure is too short for the given interest rate.");
        } else {
          const emi = (loanAmount * loanRate * Math.pow(1 + loanRate, loanTenure)) / denominator;
          $("#result").html(`EMI: ₹${emi.toFixed(2)}`);
        }
      }
    });
  });
  