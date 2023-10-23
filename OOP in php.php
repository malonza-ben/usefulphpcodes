//Am going to handle everything to deal with Object Oriented Programming here using PHP
//Classes act as blueprints for creating objects. Objects are instances of classes. You create an object using the new keyword.
//Access Modifiers: PHP has three access modifiers: public, private, and protected. They control the visibility of class members.
//The __construct() method is a special method called when an object is created. It's used to initialize object properties.
//Methods are functions defined within a class. They can be public, private, or protected. 
//Properties are variables that belong to an object. They can also be public, private, or protected.
//You can create a subclass (child class) that inherits properties and methods from a parent class. Use the extends keyword for inheritance.

class ChildClass extends ParentClass {
    // Additional properties and methods
}

//Encapsulation is the concept of bundling data and the methods that operate on the data within a single unit (a class) to restrict direct 
access to some of the object's components.
//polymorphism, allows you to use objects of different classes interchangeably if they implement the same interface or share 
a common ancestor.
//PHP allows you to define interfaces and abstract classes to establish a contract for classes that implement them.
//Static Members: You can define static properties and methods that belong to the class rather than an instance of the class.
//To manage the organization of classes across multiple files, PHP supports autoloading, which automatically loads classes when they are needed.
//Namespaces allow you to organize your classes and avoid naming conflicts. You can use the namespace keyword to define namespaces.



//Example 1 in code 
<?php
// Define a class
class Car {
    // Properties
    public $make;        // The make of the car (public property)
    public $model;       // The model of the car (public property)
    private $fuelLevel;  // The fuel level (private property)

    // Constructor
    public function __construct($make, $model) {
        $this->make = $make;    // Initialize the make property
        $this->model = $model;  // Initialize the model property
        $this->fuelLevel = 0;  // Initialize the fuel level to 0
    }

    // Method to get the fuel level
    public function getFuelLevel() {
        return $this->fuelLevel;  // Return the fuel level
    }

    // Method to fill up the tank
    public function fillGasTank($liters) {
        $this->fuelLevel += $liters;  // Increase the fuel level by the specified liters
    }
}

// Create objects
$car1 = new Car("Toyota", "Camry");  // Create a Car object with make "Toyota" and model "Camry"
$car2 = new Car("Honda", "Civic");   // Create a Car object with make "Honda" and model "Civic"

// Access properties
echo "Car 1: " . $car1->make . " " . $car1->model . "\n";  // Display car make and model
echo "Car 2: " . $car2->make . " " . $car2->model . "\n";  // Display car make and model

// Call methods
$car1->fillGasTank(20);  // Fill up the gas tank of car1 with 20 liters
$car2->fillGasTank(15);  // Fill up the gas tank of car2 with 15 liters

echo "Car 1 Fuel Level: " . $car1->getFuelLevel() . " liters\n";  // Display car1's fuel level
echo "Car 2 Fuel Level: " . $car2->getFuelLevel() . " liters\n";  // Display car2's fuel level
?>



//Example 2 for bank operation 
<?php
// Define a BankAccount class to represent a bank account
class BankAccount {
    private $accountHolder; // Account holder's name
    private $balance;       // Account balance

    // Constructor to initialize the account with a name and an initial balance
    public function __construct($accountHolder, $initialBalance) {
        $this->accountHolder = $accountHolder;
        $this->balance = $initialBalance;
    }

    // Method to deposit funds into the account
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited $amount dollars. New balance: $" . $this->balance . "\n";
        } else {
            echo "Invalid deposit amount.\n";
        }
    }

    // Method to withdraw funds from the account
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawn $amount dollars. New balance: $" . $this->balance . "\n";
        } else {
            echo "Invalid withdrawal amount or insufficient funds.\n";
        }
    }

    // Method to check the account balance
    public function checkBalance() {
        echo "Account balance for $this->accountHolder: $" . $this->balance . "\n";
    }
}

// Create a bank account for John with an initial balance of $1000
$johnAccount = new BankAccount("John", 1000);

// Perform operations on John's account
$johnAccount->checkBalance();  // Check the initial balance
$johnAccount->deposit(500);   // Deposit $500
$johnAccount->withdraw(200);  // Withdraw $200
$johnAccount->withdraw(1500); // Attempt to withdraw an invalid amount
$johnAccount->checkBalance();  // Check the final balance

// Create a bank account for Alice with an initial balance of $500
$aliceAccount = new BankAccount("Alice", 500);

// Perform operations on Alice's account
$aliceAccount->checkBalance();  // Check the initial balance
$aliceAccount->deposit(300);   // Deposit $300
$aliceAccount->withdraw(800);  // Attempt to withdraw more than the balance
$aliceAccount->checkBalance();  // Check the final balance
?>

//this is the output for the above code
Account balance for John: $1000
Deposited 500 dollars. New balance: $1500
Withdrawn 200 dollars. New balance: $1300
Invalid withdrawal amount or insufficient funds.
Account balance for John: $1300
Account balance for Alice: $500
Deposited 300 dollars. New balance: $800
Withdrawn 800 dollars. New balance: $0
Account balance for Alice: $0
