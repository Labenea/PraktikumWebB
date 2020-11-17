const calculator = {
  displayNumber: "0",
  operator: null,
  firstNumber: null,
  waitingForSeccondNumber: false,
};

const buttons = document.querySelectorAll(".button");

function updateDisplay() {
  document.querySelector("#displayNumber").innerText = calculator.displayNumber;
}

function clearCalculator() {
  calculator.displayNumber = "0";
  calculator.operator = null;
  calculator.firstNumber = null;
  calculator.waitingForSeccondNumber = false;
}

function inputDigit(num) {
  if (
    calculator.waitingForSeccondNumber &&
    calculator.firstNumber === calculator.displayNumber
  ) {
    calculator.displayNumber = num;
  } else {
    if (calculator.displayNumber === "0") {
      calculator.displayNumber = num;
    } else {
      calculator.displayNumber += num;
    }
  }
}

function inverseNumber() {
  if (calculator.displayNumber === "0") {
    return;
  }
  calculator.displayNumber = calculator.displayNumber * -1;
}
function persen() {
  if (calculator.displayNumber === "0") {
    return;
  }
  calculator.displayNumber = calculator.displayNumber / 100;
}

function handleOperator(operator) {
  if (!calculator.waitingForSeccondNumber) {
    calculator.operator = operator;
    calculator.waitingForSeccondNumber = true;
    calculator.firstNumber = calculator.displayNumber;
  } else if (calculator.firstNumber != null) {
    perfomCalculation();
    calculator.operator = operator;
    calculator.firstNumber = calculator.displayNumber;
  }
}

function perfomCalculation() {
  if (calculator.firstNumber == null || calculator.operator == null) {
    alert("Anda belum menetapkan operator");
    return;
  }

  let result = 0;
  switch (calculator.operator) {
    case "+":
      result =
        parseInt(calculator.firstNumber) + parseInt(calculator.displayNumber);
      break;
    case "x":
      result =
        parseInt(calculator.firstNumber) * parseInt(calculator.displayNumber);
      break;
    case "/":
      result =
        parseInt(calculator.firstNumber) / parseInt(calculator.displayNumber);
      break;
    case "-":
      result =
        parseInt(calculator.firstNumber) - parseInt(calculator.displayNumber);
      break;
    case "^":
      result = Math.pow(
        parseInt(calculator.firstNumber),
        parseInt(calculator.displayNumber)
      );
      break;
  }

  const history = {
    firstNumber: calculator.firstNumber,
    secondNumber: calculator.displayNumber,
    operator: calculator.operator,
    result: result,
  };
  putHistory(history);
  calculator.displayNumber = result;
  renderHistory();
}

for (const button of buttons) {
  button.addEventListener("click", function (event) {
    const target = event.target;
    if (target.classList.contains("clear")) {
      clearCalculator();
      updateDisplay();
      return;
    }
    if (target.classList.contains("negative")) {
      inverseNumber();
      updateDisplay();
      return;
    }
    if (target.classList.contains("equals")) {
      perfomCalculation();
      updateDisplay();
      return;
    }
    if (target.classList.contains("operator")) {
      handleOperator(target.innerText);
      updateDisplay();
      return;
    }
    if (target.classList.contains("persen")) {
      persen();
      updateDisplay();
      return;
    }
    inputDigit(target.innerText);
    updateDisplay();
  });
}
