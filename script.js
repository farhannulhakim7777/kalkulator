/**
 * Farhan Kalkulator JavaScript
 * Menangani interaksi tombol kalkulator seperti HP
 */

// State kalkulator
let currentNumber = '0';
let previousNumber = '';
let operator = null;
let shouldResetDisplay = false;

// DOM Elements
const displayResult = document.querySelector('.display-result');
const displayExpression = document.querySelector('.display-expression');

// Update display
function updateDisplay() {
    displayResult.textContent = currentNumber;
    
    if (operator && previousNumber) {
        let operatorDisplay = operator;
        if (operator === '*') operatorDisplay = '×';
        if (operator === '/') operatorDisplay = '÷';
        if (operator === '^') operatorDisplay = '^';
        displayExpression.textContent = `${previousNumber} ${operatorDisplay}`;
    } else {
        displayExpression.textContent = '';
    }
    
    // Update hidden inputs
    document.querySelector('input[name="num1"]').value = previousNumber;
    document.querySelector('input[name="operator"]').value = operator;
}

// Handle number buttons
document.querySelectorAll('.key-number').forEach(button => {
    button.addEventListener('click', () => {
        const number = button.dataset.number;
        
        if (shouldResetDisplay) {
            currentNumber = '';
            shouldResetDisplay = false;
        }
        
        if (number === '.' && currentNumber.includes('.')) {
            return;
        }
        
        if (currentNumber === '0' && number !== '.') {
            currentNumber = number;
        } else {
            currentNumber += number;
        }
        
        updateDisplay();
    });
});

// Handle operator buttons
document.querySelectorAll('.key-operator').forEach(button => {
    button.addEventListener('click', () => {
        const selectedOperator = button.dataset.operator;
        
        if (operator && !shouldResetDisplay) {
            // Calculate first if there's already an operator
            calculate();
        }
        
        previousNumber = currentNumber;
        operator = selectedOperator;
        shouldResetDisplay = true;
        
        updateDisplay();
    });
});

// Handle equals button
document.querySelector('.key-equals').addEventListener('click', (e) => {
    e.preventDefault();
    
    if (operator && previousNumber) {
        // Set hidden num2 untuk PHP
        document.querySelector('input[name="num2"]').value = currentNumber;
        
        // Submit form untuk kalkulasi PHP
        document.querySelector('.calculator-form').submit();
    }
});

// Handle clear button
document.querySelector('.key-clear').addEventListener('click', (e) => {
    e.preventDefault();
    
    currentNumber = '0';
    previousNumber = '';
    operator = null;
    shouldResetDisplay = false;
    
    updateDisplay();
});

// Calculate function (untuk preview)
function calculate() {
    const prev = parseFloat(previousNumber);
    const current = parseFloat(currentNumber);
    
    if (isNaN(prev) || isNaN(current)) return;
    
    let result;
    switch (operator) {
        case '+':
            result = prev + current;
            break;
        case '-':
            result = prev - current;
            break;
        case '*':
            result = prev * current;
            break;
        case '/':
            result = prev / current;
            break;
        case '%':
            result = prev % current;
            break;
        case '^':
            result = Math.pow(prev, current);
            break;
        default:
            return;
    }
    
    currentNumber = result.toString();
    previousNumber = '';
    operator = null;
    shouldResetDisplay = true;
    
    updateDisplay();
}

// Keyboard support
document.addEventListener('keydown', (e) => {
    if (e.key >= '0' && e.key <= '9') {
        document.querySelector(`.key-number[data-number="${e.key}"]`)?.click();
    } else if (e.key === '.') {
        const dotBtn = document.querySelector('.key-number[data-number="." ]');
        if (dotBtn) dotBtn.click();
    } else if (e.key === '+') {
        document.querySelector('.key-operator[data-operator="+"]')?.click();
    } else if (e.key === '-') {
        document.querySelector('.key-operator[data-operator="-"]')?.click();
    } else if (e.key === '*') {
        document.querySelector('.key-operator[data-operator="*"]')?.click();
    } else if (e.key === '/') {
        e.preventDefault();
        document.querySelector('.key-operator[data-operator="/"]')?.click();
    } else if (e.key === '%') {
        document.querySelector('.key-operator[data-operator="%"]')?.click();
    } else if (e.key === '^') {
        document.querySelector('.key-operator[data-operator="^"]')?.click();
    } else if (e.key === 'Enter' || e.key === '=') {
        document.querySelector('.key-equals')?.click();
    } else if (e.key === 'Escape' || e.key === 'c' || e.key === 'C') {
        document.querySelector('.key-clear')?.click();
    }
});

// Initialize display
updateDisplay();
